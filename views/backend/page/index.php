<?php

use App\Models\post;

$list = post::where('status', '!=', 0)->orderBy('Created_at', 'DESC')->get();
$list = post::join('topic', 'post.topic_id', '=', 'topic.id')
   ->where('post.status', '!=', 0)
   ->orderBy('post.created_at', 'desc')
   ->select("post.*", "topic.name as topic_name")
   ->get();
?>
<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<form action="index.php?option=page&cat=create" method="post" enctype="multipart/form-data">
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
               <h1 class="d-inline">TẤT CẢ TRANG ĐƠN</h1>
               </div>
            </div>
         </div>
      </section>
      <section class="content">
         <div class="card">
            <div class="card-header">
               <div class="row">
                  <div class="col-sm-6">
                     <a href="index.php?option=page&cat=trash">
                        <i class="fa fa-trash" style="color: #066534;"></i> Thùng rác</a>
                  </div>
                  <div class="col-sm-6 text-right">
                     <a href="index.php?option=page&cat=create" class="btn btn-sm btn-primary">Thêm bài viết</a>
                  </div>
               </div>
            </div>
            <div class="card-body p-2">
               <?php require_once "../views/backend/message.php"; ?>
               <table class="table table-bordered table-hover">
                  <thead>
                     <tr>
                        <th class="text-center" style="width:30px;">
                           <input type="checkbox">
                        </th>
                        <th class="text-center" style="width:130px;">Hình ảnh</th>
                        <th class="text-center">Tiêu đề bài viết</th>
                        <th class="text-center">Tên chủ đề</th>
                        <th class="text-center">Chi tiết bài viết</th>
                        <th class="text-center" style="width:170px">Chức năng</th>
                        <th class="text-center" style="width:30px">ID</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if (count($list) > 0) : ?>
                        <?php foreach ($list as $item) : ?>
                           <tr>
                              <td class="text-center">
                                 <input type="checkbox" />
                              </td>
                              <td class="text-center">
                                 <img src="../public/images/post/<?= $item->image; ?>" class="img-fluid" alt="hinh">
                              </td>
                              <td class="text-center">
                                 <?= $item->title; ?>
                              </td>
                              <td class="text-center">
                                 <div class="topic_name">
                                    <?= $item->topic_name; ?>
                                 </div>
                              </td>
                              <td class="text-center">
                                 <?= $item->detail; ?>
                              </td>
                              <td class="text-center">

                                 <?php if ($item->status == 2) : ?>
                                    <a href="index.php?option=page&cat=status&id=<?= $item->id; ?>" class="btn btn-sm btn-dark">
                                       <i class="fa fa-toggle-off" style="color: #db0650;"></i>
                                    </a>
                                 <?php else : ?>
                                    <a href="index.php?option=page&cat=status&id=<?= $item->id; ?>" class="btn btn-sm btn-success">
                                       <i class="fas fa-toggle-on"></i>
                                    </a>
                                 <?php endif; ?>
                                 <a href="index.php?option=page&cat=show&id=<?= $item->id; ?>" class="btn btn-sm btn-info">
                                    <i class="fa fa-eye" style="color: #00fbff;"></i>
                                 </a>
                                 <a href="index.php?option=page&cat=edit&id=<?= $item->id; ?>" class="btn btn-sm btn-primary">
                                    <i class="far fa-edit"></i>
                                 </a>
                                 <a href="index.php?option=page&cat=delete&id=<?= $item->id; ?>" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                 </a>
                              </td>
                              <td class="text-center"><?= $item->id; ?></td>
                           </tr>
                        <?php endforeach; ?>
                     <?php endif; ?>
                  </tbody>
               </table>
            </div>
         </div>
      </section>
   </div>
   <!-- END CONTENT-->
   <?php require_once "../views/backend/footer.php"; ?>