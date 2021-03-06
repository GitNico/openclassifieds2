<?php defined('SYSPATH') or die('No direct script access.');?>

<div class="page-header">
    <a class="btn btn-primary pull-right ajax-load" href="<?=Route::url('oc-panel',array('controller'=>'userfields','action'=>'new'))?>" title="<?=__('New field')?>">
        <?=__('New field')?>
    </a>
    <h1><?=__('Custom Fields for Users')?></h1>
    <?if (Theme::get('premium')!=1):?>
        <p class="well"><span class="label label-info"><?=__('Heads Up!')?></span> 
            <?=__('Custom fields are only available with premium themes!').'<br/>'.__('Upgrade your Open Classifieds site to activate this feature.')?>
            <a class="btn btn-success pull-right ajax-load" href="<?=Route::url('oc-panel',array('controller'=>'theme'))?>" title="<?=__('Browse Themes')?>"><?=__('Browse Themes')?></a>
        </p>
    <?endif?>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <ol class='plholder' id="ol_1" data-id="1">
                <?if (is_array($fields)):?>
                    <?foreach($fields as $name=>$field):?>
                        <li data-id="<?=$name?>" id="li_<?=$name?>"><i class="glyphicon   glyphicon-move"></i> 
                            <?=$name?>        
                            <span class="label label-info "><?=$field['type']?></span>
                            <span class="label label-info "><?=($field['required'])?__('required'):NULL?></span>
                            <span class="label label-info "><?=(isset($field['show_profile']) AND $field['show_profile'])?__('Show profile'):NULL?></span>
                            <span class="label label-info "><?=(isset($field['show_register']) AND $field['show_register'])?__('Show register'):NULL?></span>
                    
                            <a 
                                href="<?=Route::url('oc-panel', array('controller'=> 'userfields', 'action'=>'delete','id'=>$name))?>" 
                                class="btn btn-xs btn-danger pull-right index-delete index-delete-inline" 
                                title="<?=__('Are you sure you want to delete? All data contained in this field will be deleted.')?>" 
                                data-id="li_<?=$name?>" 
                                data-placement="left" 
                                data-href="<?=Route::url('oc-panel', array('controller'=> 'userfields', 'action'=>'delete','id'=>$name))?>" 
                                data-btnOkLabel="<?=__('Yes, definitely!')?>" 
                                data-btnCancelLabel="<?=__('No way!')?>">
                                <i class="glyphicon glyphicon-trash"></i>
                            </a>
                    
                            <a class="btn btn-xs btn-primary pull-right ajax-load" title="<?=__('Edit')?>"
                                href="<?=Route::url('oc-panel',array('controller'=>'userfields','action'=>'update','id'=>$name))?>">
                                <?=__('Edit')?>
                            </a>
                        </li>
                    <?endforeach?>
                <?endif?>
                </ol><!--ol_1-->
                <span id='ajax_result' data-url='<?=Route::url('oc-panel',array('controller'=>'userfields','action'=>'saveorder'))?>'></span>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    

</div>
