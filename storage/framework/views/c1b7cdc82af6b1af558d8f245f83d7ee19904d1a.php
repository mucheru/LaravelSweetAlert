<!DOCTYPE html>
<html>
  <head>
    <title>Laravel Sweet Alert Confirm Delete Tutorial-MyWebtuts.com</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css">
    
    <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  </head>
  <body class="bg-dark">
    <div class="container">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card mt-5">
            <div class="card-header">
              <h5>Laravel Sweet Alert Confirm Delete Tutorial</h5>
            </div>
            <div class="card-body">
              <table class="table table-bordered">
                <tr>
                  <td>Name</td>
                  <td>Email</td>
                  <td width="5%">Action</td>
                </tr>
                  <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($admin->name); ?></td>  
                    <td><?php echo e($admin->email); ?></td>  
                    <td>
                      <button class="btn btn-danger btn-flat btn-sm remove-admin" data-id="<?php echo e($admin->id); ?>" data-action="<?php echo e(route('admins.destroy',$admin->id)); ?>"> Delete</button>
                    </td>  
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  <script type="text/javascript">

    $("body").on("click", ".remove-admin", function(){
      var current_object = $(this);
      swal({
          title: "Are you sure?",
          text: "You will not be able to recover this imaginary file!",
          type: "error",
          showCancelButton: true,
          dangerMode: true,
          cancelButtonClass: '#DD6B55',
          confirmButtonColor: '#dc3545',
          confirmButtonText: 'Delete!',
      },function (result) {
          if (result) {
              var action = current_object.attr('data-action');
              var token = jQuery('meta[name="csrf-token"]').attr('content');
              var id = current_object.attr('data-id');

              $('body').html("<form class='form-inline remove-form' method='post' action='"+action+"'></form>");
              $('body').find('.remove-form').append('<input name="_method" type="hidden" value="delete">');
              $('body').find('.remove-form').append('<input name="_token" type="hidden" value="'+token+'">');
              $('body').find('.remove-form').append('<input name="id" type="hidden" value="'+id+'">');
              $('body').find('.remove-form').submit();
          }
      });
  });
  </script>
  </body>
</html><?php /**PATH /home/steve/sweetdelete/resources/views/admin.blade.php ENDPATH**/ ?>