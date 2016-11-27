<?php $paginator = $this->Paginator;
?>
<div class="tab-content">
  <div id="home" class="tab-pane fade in active" style="margin-left:5%;width:90%;">
      <div class="row" style="margin-top:8%;">
         <div class="col-sm-12" style="margin-bottom:10%;">
            <div class="card-box">
               <?php foreach($data as $k=>$v){ 
                    $uname = $v['Sender']['fname'];
                    if($v['Message']['isSender']==1){
                        $imgUrl = $this->Custom->imageUrl($v['Sender']['image'],WWW_ROOT.'images/users/');
                        $class = 'pull-right';
                        //$uname = $v['Sender']['fname'];
                    }else{
                        $imgUrl = $this->Custom->imageUrl($v['Receiver']['image'],WWW_ROOT.'images/users/');
                        $class = 'pull-left';
                        //$uname = $v['Receiver']['fname'];
                    }    
                ?>
                    <div class="message col-md-12">
                        <div class="col-md-5 <?php echo $class;?>">    
                            <div class="user_icon">
                                <img alt="" src="<?php echo $imgUrl;?>" class="img-circle" style="height:5em;" >
                                <?php echo $uname;?>
                            </div>
                            <div class="user_msg"><?php echo $v['Message']['message'];?></div>
                            <div class="msg_date"><?php echo date('M d | H:i A',strtotime($v['Message']['created']))?></div>
                        </div>    
                    </div>                   
               <?php } ?>

               <div class="pagination pagination-large" style="float:right;">
                    <ul class="pagination">
                        <?php
                            echo $this->Paginator->prev(__('prev'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                            echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
                            echo $this->Paginator->next(__('next'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div>
            <?php echo $this->Form->create('Message',array('class'=>'form-horizontal','enctype'=>'multipart/form-data')); ?>
            <?php echo $this->Form->input('message',array('class'=>'form-control','placeholder'=>'Message','div'=>false,'label'=>false));?>
            <?php echo $this->Form->hidden('receiver',array('value'=>isset($this->request->params['pass'][0]) ? $this->request->params['pass'][0]:''));?>
            <?php 
                echo $this->Form->submit('Send',array('class'=>'myCustbtn pull-right')); 
                echo $this->Html->link(
                    'Back',
                    array(
                        'controller' => 'inbox',
                        'action' => 'index'       
                    ),
                    array('class' => 'myCustbtn pull-right','style'=>'margin-right:20px;' )
                );
            ?>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>    

<style type="text/css">
.rating-container .filled-stars{
   color: #72c35d;
   
}
</style>

<script type="text/javascript">
   $('.rating').rating('create', {disabled: true, showClear: false, showCaption: false,size:'sm'});
</script>