<?php
use yii\bootstrap\ActiveForm;
/**
 * Created by PhpStorm.
 * User: weilone
 * Date: 2019/2/20
 * Time: 13:28
 */
$this->title = '系统设置';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title"><?=$this->title?></h3>
  </div>
    <?php ActiveForm::begin(['id' => 'form-setting','options'=>['enctype'=>'multipart/form-data','class' => 'form-horizontal']]); ?>
    <div class="box-body">
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">vip价格(元)</label>
        <div class="col-sm-10">
          <input type="number" name="data[vip_price]" value="<?=$data['vip_price']?>" class="form-control" id="inputEmail3" placeholder="请输入的数字">
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">vip价格图片</label>
        <div class="col-sm-10">
            <?= \common\widgets\webuploader\Images::widget([
                'name'  =>'data[vip_price_img]',
                'value' => $data['vip_price_img'],
                'config' => [
                    'pick' => [
                        'multiple' => false,
                    ],
                ]
            ]) ?>
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">vip时长(月)</label>
        <div class="col-sm-10">
          <input type="number" name="data[vip_month]" value="<?=$data['vip_month']?>" class="form-control" id="inputEmail3" placeholder="请输入的数字">
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail31" class="col-sm-2 control-label">vip说明</label>
        <div class="col-sm-10">
          <input type="text" name="data[vip_desc]" value="<?=$data['vip_desc']?>" class="form-control" id="inputEmail31" placeholder="">
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">vip提成(%)</label>
        <div class="col-sm-10">
          <input type="number" name="data[vip_point]"  value="<?=$data['vip_point']?>" class="form-control" id="inputPassword3" placeholder="请输入0~100的数字" min="0" max="100">
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">专栏提成(%)</label>
        <div class="col-sm-10">
          <input type="number" name="data[special_point]"  value="<?=$data['special_point']?>" class="form-control" id="inputPassword3" placeholder="请输入0~100的数字" min="0" max="100">
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">公众号图片</label>
        <div class="col-sm-10">
            <?= \common\widgets\webuploader\Images::widget([
                'name'  =>'data[sub_img]',
                'value' => $data['sub_img'],
                'config' => [
                    'pick' => [
                        'multiple' => false,
                    ],
                ]
            ]) ?>
        </div>
      </div>
    </div>
    <input type="hidden" name="">
    <!-- /.box-body -->
    <div class="box-footer" style="text-align: center">
      <button type="reset" class="btn btn-default">重置</button>
      <button type="submit" class="btn btn-info ">保存</button>
    </div>
    <!-- /.box-footer -->
 <?php ActiveForm::end()?>
</div>
