<?php
use common\models\Hanzi;
use common\models\HanziImage;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Hanzi */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="hanzi-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal', 'id' => 'hanzi-form']); ?>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6 strong" style="font-size: 25px" > 
            <?php if(!empty($model->word)) {
                    echo $model->word;
                } else{
                    echo Html::img("@web/img/tw/$model->picture");
                }  
            ?>
        </div>
    </div>

    <?php if($seq == 1) { 
        $readonly = $seq == 1 ? false : true;
        ?>

    <?php echo $form->field($model, 'hard10')->dropDownList(['0' => '否', '1' => '是'], ['disabled' => $readonly]) ?>

    <?php echo $form->field($model, 'initial_split11')->textInput(['maxlength' => true, 'readonly' => $readonly]) ?>

    <?php echo $form->field($model, 'initial_split12')->textInput(['maxlength' => true, 'readonly' => $readonly]) ?>

    <?php echo $form->field($model, 'deform_split10')->textInput(['maxlength' => true, 'readonly' => $readonly]) ?>

    <?php echo $form->field($model, 'similar_stock10')->textInput(['maxlength' => true, 'readonly' => $readonly]) ?>

    <?php  } ?>

    <?php if($seq == 2) { 
        $readonly = $seq == 2 ? false : true;
        ?>

    <?php echo $form->field($model, 'hard20')->dropDownList(['0' => '否', '1' => '是'], ['disabled' => $readonly]) ?>

    <?php echo $form->field($model, 'initial_split21')->textInput(['maxlength' => true, 'readonly' => $readonly]) ?>

    <?php echo $form->field($model, 'initial_split22')->textInput(['maxlength' => true, 'readonly' => $readonly]) ?>

    <?php echo $form->field($model, 'deform_split20')->textInput(['maxlength' => true, 'readonly' => $readonly]) ?>

    <?php echo $form->field($model, 'similar_stock20')->textInput(['maxlength' => true, 'readonly' => $readonly]) ?>

    <?php  } ?>

    <?php if($seq == 3) { ?>

    <?php echo $this->render('_splitTable', [
        'model' => $model,
    ]) ?>

    <?php echo $form->field($model, 'hard30')->dropDownList(['0' => '否', '1' => '是']) ?>

    <?php echo $form->field($model, 'initial_split31')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'initial_split32')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'deform_split30')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'similar_stock30')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'remark')->textInput(['maxlength' => true]) ?>

    <?php  } ?>

    <!-- <?php echo $form->field($model, 'created_at')->textInput() ?>

    <?php echo $form->field($model, 'updated_at')->textInput() ?> -->

    <input type="hidden" id="next" name="next" value='false'> 

    <div class="form-group">
        <div class="col-lg-offset-3 col-lg-8">
        <?php echo Html::Button($model->isNewRecord ? Yii::t('frontend', 'Create') : Yii::t('frontend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'id' => 'update-button']) ?>
        <?php echo Html::Button($model->isNewRecord ? Yii::t('frontend', 'Create And Next') : Yii::t('frontend', 'Update And Next'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'id' => 'next-button']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

 <?php
$script = <<<SCRIPT
    $('#next-button').click(function() {
        $('#next').val('true');
        $('#hanzi-form').submit();
    });
    $('#update-button').click(function() {
        $('#next').val('false');
        $('#hanzi-form').submit();
    });
SCRIPT;
$this->registerJs($script, \yii\web\View::POS_END);
