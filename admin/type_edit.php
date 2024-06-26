 <?php
  if (isset($_GET['t_id'])) {
    include 'condb.php';
    $stmt = $conn->prepare("SELECT* FROM tbl_type WHERE t_id=?");
    $stmt->execute([$_GET['t_id']]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    //ถ้าคิวรี่ผิดพลาดให้กลับไปหน้า index
    if ($stmt->rowCount() < 1) {
      header('Location: index.php');
      exit();
    }
  } //isset
  ?>
 <div class="card card-info">
   <div class="card-header">
     <h3 class="card-title">แก้ไขข้อมูลประเภทเอกสาร</h3>
   </div>
   <!-- /.card-header -->
   <div class="card-body">
     <form action="./type_edit_db.php" method="POST" enctype="multipart/form-data">
       <div class="row">
         <div class="col-sm-6">
           <!-- text input -->
           <div class="mb-3">
             <label class="mb-2">ชื่อประเภทเอกสาร</label>
             <input type="text" name="t_name" value="<?= $row['t_name']; ?>" class="form-control">
           </div>
         </div>
         <div class="col-sm-6">
           <!-- text input -->
           <div class="mb-3">
             <label class="mb-2">ชื่อภาษาอังกฤษ</label>
             <input type="text" name="t_nameEN" value="<?= $row['t_nameEN']; ?>" class="form-control">
           </div>
         </div>
         <div class="col-sm-6">
           <!-- text input -->
           <div class="mb-3">
             <label class="mb-2">สถานะ</label>
             <select name="StatusType" class="form-select" required>
              <option value="">-เลือกสถานะ-</option>
              <option value="Using">เปิด</option>
              <option value="No Using">ปิด</option>
            </select>
           </div>
         </div>
       </div>
       <br>
       <div class="row" align="center">
         <div class="col">
           <input type="hidden" name="t_id" value="<?= $row['t_id']; ?>" class="form-control">
           <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
           <a href="type.php" class="btn btn-danger" data-dismiss="modal">ยกเลิก</a>
         </div>
       </div>
     </form>
   </div>
   <!-- /.card-body -->
 </div>