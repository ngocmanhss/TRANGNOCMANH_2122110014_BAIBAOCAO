<?php

use App\Models\orderdetail;
$list = orderdetail::where('status', '=', 0)->orderdetailBy('Created_at', 'DESC')->get();
?>
<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<form action="index.php?option=orderdetail&cat=process" method="orderdetail" enctype="multipart/form-data">
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
               <h1 class="d-inline">THÙNG RÁC CHI TIẾT ĐƠN HÀNG</h1>
               </div>
            </div>
         </div>
      </section>
      <section class="content">
         <div class="card">
            <div class="card-header ">
               <div class="row">
                  <div class="col-md-6">
                  </div>
                  <div class="col-md-6 text-right">
                     <a class="btn btn-sm btn-info" href="index.php?option=orderdetaildetail">
                        <i class="fas fa-arrow-left"></i> Về chi tiết đơn hàng
                     </a>
                     </button>
                  </div>
               </div>
            </div>
            <div class="card-body p-2">
               <?php require_once "../views/backend/message.php"; ?>
               <table class="table table-borderdetailed table-hover">
                  <thead>
                     <tr>
                        <th class="text-center" style="width:30px;">
                           <input type="checkbox">
                        </th>
                        <th class="text-center">Tên giao hàng</th>
                        <th class="text-center">Email giao hàng</th>
                        <th class="text-center">SĐT giao hàng</th>
                        <th class="text-center">Địa chỉ giao hàng</th>
                        <th class="text-center" style="width:170px">Chức năng</th>
                        <th class="text-center" style="width:30px">ID</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if (count($list) > 0) : ?>
                        <?php foreach ($list as $item) : ?>
                           <tr class="datarow">
                              <td>
                                 <input type="checkbox">
                              </td>
                              <td class="text-center">
                                 <div class="deliveryname"></div>
                                 <?= $item->deliveryname; ?>
                              </td>
                              <td class="text-center">
                                 <div class="deliveryemail"></div>
                                 <?= $item->deliveryemail; ?>
                              </td>
                              <td class="text-center">
                                 <div class="deliveryphone"></div>
                                 <?= $item->deliveryphone; ?>
                              </td>
                              <td class="text-center">
                                 <div class="deliveryaddress"></div>
                                 <?= $item->deliveryaddress; ?>
                              </td>
                              <td class="text-center">
                              <a href="index.php?option=orderdetail&cat=destroy&id=<?= $item->id; ?>" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                 </a>
                                 <a href="index.php?option=orderdetail&cat=restore&id=<?= $item->id; ?>" class="btn btn-sm btn-info">
                                    <i class="fas fa-undo"></i>
                                 </a>
                              </td>
                              <td class="text-center"><?= $item->id ?></td>
                           </tr>
                        <?php endforeach; ?>
                     <?php endif; ?>
                  </tbody>
               </table>
            </div>
         </div>
      </section>
   </div>
</form>
<!-- END CONTENT-->
<?php require_once "../views/backend/footer.php"; ?>