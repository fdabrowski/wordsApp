<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model backend\models\Zestaw */
$this->registerJsFile('@web/js/jquery-3.2.1.min.js', ['position'=>$this::POS_HEAD]);
$this->title = $model->nazwa;
$words = $model->zestaw;
$isGuest = Yii::$app->user->isGuest;
$this->params['breadcrumbs'][] = ['label' => 'Zestawy', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zestaw-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <!-- <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'jezyk1_id',
            'jezyk2_id',
            'podkategoria_id',
            'nazwa',
            'zestaw:ntext',
            'ilosc_slowek',
            'data_dodania',
            'data_edycji',
        ],
    ]) ?> -->
    <div class="word-mode">
        <div class="col-lg-3">
            <a class="btn btn-default btn-primary btn-lg btn-block button-category" id="learning-mode-button">Tryb nauki</a>
        </div>
        <div class="col-lg-3">
            <a class="btn btn-default btn-primary btn-lg btn-block button-category" id="testing-mode-button">Tryb testu</a>
        </div>
    </div>
    <div class="word-guess" style="display: none;">
        <h3 class="word-guess__polishword">
        </h3>
        <div class="form-group">
          <label for="usr">Odpowiedź:</label>
          <input type="text" class="form-control" id="answer">
        </div>
        <button class="btn btn-primary pull-right" id="confirm-answer">OK</button>
    </div>
    <div class="word-results" style="display: none;"></div>
    <div class="word-all" style="display: none;"></div>
    <button class="btn btn-secondary btn-block" id="back-button" style="display: none;">Powrót</button>
</div>

<script type="text/javascript">
var words = '<?php echo $words;?>'
var isGuest = '<?php echo $isGuest;?>'
console.log(isGuest);

var wordsArray = words.split(/;| /);
var wordsObjects = [];
var answersArray = [];
var wordIndex = 0;

for(var i=0; i<wordsArray.length; i = i+2){
    wordsObjects.push({
        "polishWord" : wordsArray[i],
        "englishWord" : wordsArray[i+1]
    })
}

$("#confirm-answer").off('click').on('click', function(){
    var polishWord = $('[data-function="polishword"]').text();
    var englishWord = $("#answer").val();
    guessWordFunc(polishWord, englishWord);
});

$("#back-button").off('click').on('click', function(){
    wordIndex = 0;
    answersArray = [];
    $(".word-mode").show();
    $(".word-guess").hide();
    $(".word-all").hide();
    $(".word-results").html("").hide();
    $("#back-button").hide();
});


var showWordFunc = function showWord(wordIndex){
    if(wordIndex >= wordsObjects.length){
        var answersCorrect = 0;
        var $table = $($resultsTableTpl);

        $.each(wordsObjects, function(index, wordObject){
            var $tableItem = $($tableItemTpl);
                $tableItem.attr('data-index', index);
                $tableItem.find("td").eq(0).text(wordObject.polishWord);
                $tableItem.find("td").eq(1).text(wordObject.englishWord);

                $table.find("tbody").append($tableItem);
        });

        $.each(answersArray, function(index, wordObject){
            var $tableItem = $table.find('[data-index="'+ index +'"]');
                $tableItem.find("td").eq(2).text(wordObject.englishWord);

                if(wordObject.englishWord.trim() !== wordsObjects[index].englishWord){
                    $tableItem.find("td").eq(2).addClass("text-danger bg-danger");
                }
                else{
                    answersCorrect++;
                    $tableItem.find("td").eq(2).addClass("text-success bg-success");
                }
        });

        if(isGuest){

        }
        else{
            var newDate = new Date();

            $.ajax({
                url: <?php echo '"'.Url::to(['wynik/create']).'"'  ?> ,
                data: {
                    'user_id' : <?php echo Yii::$app->user->id ?>,
                    'zestaw_id' : <?php echo $model->id ?>,
                    'data_wyniku' : newDate.getFullYear()+ "-"+ (newDate.getMonth()+1) + "-" + newDate.getDate(),
                    'wynik' : Number((answersCorrect/answersArray.length).toFixed(2))/100
                },
                error: function() {
                    console.log("ERROR");
                },
                dataType: 'jsonp',
                success: function(data) {
                    console.log(data);
                },
                type: 'POST'
            });
        }

        $(".word-results").append($table);
        $(".word-results").show();
        $(".word-guess").hide();
        $("#back-button").show();
    }
    else{
        $("#back-button").hide();
        $(".word-guess").find(".word-guess__polishword").html("Słowo " + (wordIndex+1) + ": " + "<span data-function='polishword'>" + wordsObjects[wordIndex].polishWord + "</span>");
        $("#answer").val("");
    }
}

var $resultsTableTpl = [
    '<table class="table table-striped table-bordered">',
    '   <tbody>',
    '       <tr>',
    '           <td>Polskie słowo</td>',
    '           <td>Tłumaczenie</td>',
    '           <td>Twoja odpowiedź</td>',
    '       </tr>',
    '   </tbody>',
    '</table>'
].join("\n");

var $tableItemTpl = [
    '<tr data-key="1">',
    '   <td></td>',
    '   <td></td>',
    '   <td></td>',
    '</tr>'
].join("\n");

var guessWordFunc = function(polishWord, englishWord){
    answersArray.push({
        "polishWord" : polishWord,
        "englishWord" : englishWord
    });

    wordIndex++;

    showWordFunc(wordIndex);
}

// showWordFunc(wordIndex);

var chooseModeFunc = function(){
    $("#learning-mode-button").off('click').on('click', function(){
        showAllWordsFunc();
    });

    $("#testing-mode-button").off('click').on('click', function(){
        $(".word-mode").hide();
        $(".word-guess").show();
        showWordFunc(wordIndex);
    });
}

var showAllWordsFunc = function(){
    var $allWordsTable = $(allWordsTable);

    $.each(wordsObjects, function(index, wordObject){
        var $tableItem = $($tableItemTpl);
            $tableItem.find("td").last().remove();
            $tableItem.find("td").eq(0).text(wordObject.polishWord);
            $tableItem.find("td").eq(1).text(wordObject.englishWord);

        $allWordsTable.find("tbody").append($tableItem);
    });
    $(".word-all").find(".table-allwords").remove();
    $(".word-all").append($allWordsTable).show();
    $(".word-mode").hide();
    $("#back-button").show();
}

var allWordsTable = [
    '<table class="table table-striped table-bordered table-allwords">',
    '   <tbody>',
    '       <tr>',
    '           <td>Polskie słowo</td>',
    '           <td>Tłumaczenie</td>',
    '       </tr>',
    '   </tbody>',
    '</table>'
].join("\n");

chooseModeFunc();


</script>
