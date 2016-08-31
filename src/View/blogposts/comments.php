<h2>Moderator<small style='margin-left:30%;'>
<button type='button' class='btn btn-warning' data-toggle='modal' data-target='#comment-modal-xl'>Write comment</button></small>
<small class='pull-right' style='margin-top:1.5%;'>All comments: <?= count($data['comments']) ?></small></h2></br>

<table class='table table-hover'>
    <thead>
      <tr>
      	<!--<th>Id</th>-->
        <th>Image</th>
      	<th>Name</th>
      	<th>Comment</th>
        <th>Date</th>
        <th>Action</th>
      </tr>
    </thead><tbody>

<?php 
    $USER = new User();

    foreach($data['comments'] as $each){

    $user = $USER->get_instance($each->user_id);


    echo "<tr>";

    echo "<td><img class='img-rounded' src='".$user->get_image()."' width='70'></td>";
    echo "<td><a href='admin/user/view/".$user->id."'>" .$user->username ."</a></td>";
    echo "<td class='col-md-8' style='text-align:justify;'>" .$each->comment ."</td>";

    echo "<td>" .date("Y.m.d",$each->date) ."</br><font size='2'><i>at ".date("H:i:s",$each->date)."</i></font></td>";
    echo "<td>";


    echo "

       <div class='btn-group' role='group'>
           <a href='' type='button' class='btn btn-warning btn-sm' style='min-width:70px;''>Edit</a>
           <a type='button' data-toggle='modal' data-target='.delete_".$each->id."' class='btn btn-danger btn-sm'><i class='fa fa-trash-o' aria-hidden='true'></i></a>
       </div>

    ";


    echo "</td>";

    echo "</tr>";


       Bootstrap::delete_confirmation(
        "delete_".$each->id."",
        "Are you sure?",
        "<b>Delete this comment: </b>".$each->comment." <b>?</b>",
        "<a href='admin/blogpost/deletecomment/".$each->id."' type='button' class='btn btn-danger'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span> Delete</a>
        <button type='button' class='btn btn-default' data-dismiss='modal'>Cencel</button>"
        );






    }

?>

</tbody>
</table>

</br>
</br>

<?php  $user = $USER->get_instance(Session::get('id')); ?>

<div class='modal' id='comment-modal-xl' tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel' aria-hidden='true'>
  <div class='modal-dialog modal-md'>
    <div class='modal-content'>

    <form action='admin/blogpost/newcomment' method='POST'>
        <div class='modal-header-warning' style='padding:15px;padding-bottom: 0px;'>
          <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>
          <h3 class='modal-title'><span class='fa fa-comment-o float-left'></span>  Write comment</h3>
        </div>
        <div class='modal-body'>
        <h5 style='font-weight:bolder;'>Write as: <a href='admin/user/view/<?=  $user->id ?>'><?=  $user->username ?></a>
        <img src='<?=  $user->get_thumb(); ?>' class='img img-rounded pull-right' width='30'></h5>
        <input type='hidden' name='blogpost_id' value='<?php echo $data['blogpost']->id ?>' >
          <textarea style='width:100%;' rows='5' name='comment' required></textarea>
        
         </div>
        <div class='modal-footer'>
           <button type='submit' class='btn btn-warning'>Send</button>
        </div>
    </form>
  </div>
</div>
</div>




