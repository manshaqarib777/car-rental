<?php $__env->startSection('styles'); ?>
<style media="screen">
.paypal-buttons {
  width: 10% !important;
  display: block !important;
  margin: 0 auto !important;
}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <div class="content-area" id="contentArea">
    <div class="add-product-content py-5">

      <h3 class="text-center text-uppercase mb-4" style="font-weight: 900;"><?php echo e($langg->lang155); ?></h3>

      <div class="row mb-4">
        <div class="col-lg-6 text-right text-uppercase">
          <strong><?php echo e($langg->lang156); ?>:</strong>
        </div>
        <div class="col-lg-6 text-left">
          <?php echo e($plan->title); ?>

        </div>
      </div>

      <div class="row mb-4">
        <div class="col-lg-6 text-right text-uppercase">
          <strong><?php echo e($langg->lang157); ?>:</strong>
        </div>
        <div class="col-lg-6 text-left">
          <?php echo e($plan->price ? round($plan->price,2) : 'Free'); ?>

        </div>
      </div>

      <div class="row mb-4">
        <div class="col-lg-6 text-right text-uppercase">
          <strong><?php echo e($langg->lang158); ?>:</strong>
        </div>
        <div class="col-lg-6 text-left">
          <?php echo e($plan->ads); ?>

        </div>
      </div>

      <div class="row mb-4">
        <div class="col-lg-6 text-right text-uppercase">
          <strong><?php echo e($langg->lang159); ?>:</strong>
        </div>
        <div class="col-lg-6 text-left">
          <?php echo e($plan->days ? $plan->days . ' Days(s)' : 'Lifetime'); ?>

        </div>
      </div>

      <?php if($plan->price == 0): ?>
        <form class="" action="<?php echo e(route('user.freepublish')); ?>" method="post">
          <?php echo e(csrf_field()); ?>

          <input type="hidden" name="plan_id" value="<?php echo e($plan->id); ?>">
          <div class="text-center">
            <button type="submit" class="btn btn-primary" style="background-color:#1f224f;">Submit</div>
          </div>
        </form>
      <?php endif; ?>

      <?php if($plan->price > 0): ?>
      <div class="row mb-4">
        <div class="col-lg-6 text-right text-uppercase">
          <strong><?php echo e($langg->lang160); ?>:</strong>
        </div>
        <div class="col-lg-6 text-left">
          <div class="row">
            <div class="col-lg-6">
              <form class="form-horizontal" id="subscribe_form" action="" method="POST">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="plan_id" value="<?php echo e($plan->id); ?>">

                  <select class="form-control" name="" onchange="meThods(this)">
                    <option value="" disabled>Select a payment method</option>
                    <option value="Paypal">Paypal</option>
                    <option value="Stripe">Stripe</option>
                  </select>

                  <div id="stripes" style="display: none;">
                      <div class="form-group">
                          <div class="col-sm-12 px-0">
                              <input type="text" class="form-control" id="scard" name="card_no" placeholder="<?php echo e($langg->lang161); ?>" autocomplete="off">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-sm-12 px-0">
                              <input type="text" class="form-control" id="scvv" name="cvvNumber" placeholder="<?php echo e($langg->lang162); ?>" autocomplete="off">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-sm-12 px-0">
                              <input type="text" class="form-control" id="smonth" name="ccExpiryMonth" placeholder="<?php echo e($langg->lang163); ?>" autocomplete="off">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-sm-12 px-0">
                              <input type="text" class="form-control" id="syear" name="ccExpiryYear" placeholder="<?php echo e($langg->lang164); ?>" autocomplete="off">
                          </div>
                      </div>
                  </div>
                  <div id="paypals">
                      <input type="hidden" name="amount" value="<?php echo e($plan->price); ?>">
                  </div>

                  <div class="text-left" id="stripeSubmit" style="display:none;">
                    <button type="submit" class="btn btn-primary" style="background-color:#1f224f;"><?php echo e($langg->lang165); ?></div>
                  </div>
              </form>


            </div>
          </div>
        </div>

        <div class="paypal-modal">

        </div>
      </div>

      <?php endif; ?>

    </div>
  </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>

<?php if($plan->price != 0): ?>
<script type="text/javascript">
        function meThods(val) {
            var action2 = "<?php echo e(route('stripe.submit')); ?>";

             if (val.value == "Paypal") {
                $("#subscribe_form").attr("action", "");
                $("#scard").prop("required", false);
                $("#scvv").prop("required", false);
                $("#smonth").prop("required", false);
                $("#syear").prop("required", false);
                $("#stripes").hide();
                $("#stripeSubmit").hide();
                $(".paypal-modal").attr("style", "display: block !important");
            }
            else if (val.value == "Stripe") {
                $("#subscribe_form").attr("action", action2);
                $("#scard").prop("required", true);
                $("#scvv").prop("required", true);
                $("#smonth").prop("required", true);
                $("#syear").prop("required", true);
                $("#stripes").show();
                $("#stripeSubmit").show();
                $(".paypal-modal").attr("style", "display: none !important");
            }
        }
</script>

<script src="https://www.paypal.com/sdk/js?client-id=<?php echo e($gs->pb); ?>"></script>
<script>
paypal.Buttons({
  createOrder: function(data, actions) {
    return actions.order.create({
      purchase_units: [{
        amount: {
          value: <?php echo e($plan->price); ?>

        }
      }]
    });
  },
  onApprove: function(data, actions) {
    return actions.order.capture().then(function(details) {
      // Call your server to save the transaction
      var orderid = data.orderID;
      var fd = new FormData();
      fd.append('planid', $("input[name='plan_id']").val());
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $.ajax({
        url: '<?php echo e(route('user.paypal.storetodb')); ?>',
        type: 'POST',
        contentType: false,
        processData: false,
        data: fd,
        success: function(data) {
          if (data == "success") {
            $.notify("You have bought the package successfully!", "success");
          }
        }
      });
    });
  }
}).render('.paypal-modal');

</script>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>