<?php
use yii\helpers\Url;
use common\helpers\ArrayHelper;

?>
<?php foreach($models as $k => $model){ ?>
    <tr id="<?= $model['id']?>" class="<?= $pid?>">
        <td>
            <?php if (!empty($model['-'])){ ?>
                <div class="fa fa-minus-square cf" style="cursor:pointer;"></div>
            <?php } ?>
        </td>
        <td>
            <?= ArrayHelper::itemsLevel($model['level'], $models, $k)?>
            <?= $model['title']?>
            <!--禁止显示二级分类再次添加三级分类-->
            <?php if ($model['pid'] == 0){ ?>
                <a href="<?= Url::to(['ajax-edit','pid' => $model['id'], 'parent_title' => $model['title'], 'level' => $model['level'] + 1])?>" data-toggle='modal' data-target='#ajaxModal'>
                    <i class="fa fa-plus-circle"></i>
                </a>
            <?php } ?>
        </td>
        <td class="col-md-1">
            <input type="text" class="form-control" value="<?= $model['sort']?>" onblur="rfSort(this)">
        </td>
        <td>
            <a href="<?= Url::to(['ajax-edit','id' => $model['id'], 'parent_title' => $parent_title, 'level' => $model['level']])?>" data-toggle='modal' data-target='#ajaxModal'>
                <span class="btn btn-info btn-sm">编辑</span>
            </a>
            <?= \common\helpers\HtmlHelper::status($model['status']); ?>
            <a href="<?= Url::to(['delete','id' => $model['id']])?>" onclick="rfDelete(this);return false;">
                <span class="btn btn-warning btn-sm">删除</span>
            </a>
        </td>
    </tr>
    <?php if (!empty($model['-'])){ ?>
        <?= $this->render('tree', [
            'models' => $model['-'],
            'parent_title' => $model['title'],
            'pid' => $model['id']." ".$pid,
        ]) ?>
    <?php } ?>
<?php } ?>