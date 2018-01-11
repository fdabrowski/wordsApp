<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model backend\models\Zestaw */
$this->registerJsFile('@web/js/jquery-3.2.1.min.js', ['position'=>$this::POS_HEAD]);
$this->title = $model->nazwa;
$words = $model->zestaw;
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
            'konto_id',
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
    <div class="word-guess">
        <h3 class="word-guess__polishword">
        </h3>
        <div class="form-group">
          <label for="usr">Odpowiedź:</label>
          <input type="text" class="form-control" id="answer">
        </div>
        <button class="btn btn-primary pull-right" id="confirm-answer">OK</button>
    </div>
    <div class="word-results" style="display: none;"></div>
</div>

<script type="text/javascript">
var words = '<?php echo $words;?>'
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


var showWordFunc = function showWord(wordIndex){
    if(wordIndex >= wordsObjects.length){
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
        });

        $(".word-results").append($table);
        $(".word-results").show();
        $(".word-guess").hide();
    }
    else{
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

var guessWordFunc = function guessWord(polishWord, englishWord){
    answersArray.push({
        "polishWord" : polishWord,
        "englishWord" : englishWord
    });

    wordIndex++;

    showWordFunc(wordIndex);
}

showWordFunc(wordIndex);


</script>
