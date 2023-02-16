<div class="page-header">
    <h4 class="page-title">Tambah Diklat</h4>
    <ul class="breadcrumbs">
        <li class="nav-home">
            <a href="<?php echo base_url(); ?>">
                <i class="fa fa-home"></i>
            </a>
        </li>
        <li class="separator">
            <i class="fa fa-angle-right"></i>
        </li>
        <li class="nav-item">
            <a href="#">Tambah Diklat</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <form action="" method="POST">
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Tipe Diklat</label>
                        <select class="js-states form-control single" name="tipe" id="tipe">
                            <option value="">-- PILIH DIKLAT --</option>
                            <?php
                                        foreach ($diklat as $diklat) {
                                                echo "<option value=\"$diklat->tipe\">". strtoupper($diklat->nama)."</option>"; 
                               
                                        }
                                        ?>
                        </select>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Tahun Diklat</label>
                                <select class="js-states form-control single" name="tahun">
                                    <option>--PILIH TAHUN--</option>
                                    <?php
                                                $now = date('Y') + 5;
                                                for ($a = 2022; $a <= $now; $a++) {
                                                    if ($_GET['tahun'] == $a) {
                                                        echo "<option value='$a' selected>$a</option>";
                                                    } else {
                                                        echo "<option value='$a'>$a</option>";
                                                    }
                                                }
                                                ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Angkatan Diklat (Romawi)</label>
                                <input type="text" class="form-control" name="angkatan" placeholder="Angkatan Diklat"
                                    required>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nomor Sertifikat</label>
                                <input type="text" class="form-control" name="sertifikat" placeholder="Nomor Sertifikat"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nomor SK</label>
                                <input type="text" class="form-control" name="sk" placeholder="Nomor SK"
                                    required>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Tanggal Mulai Diklat</label>
                                <input type="date" class="form-control" name="mulai" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Tanggal Selesai Diklat</label>
                                <input type="date" class="form-control" name="selesai" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Lokasi Diklat</label>
                                <input type="text" class="form-control" name="lokasi" placeholder="Lokasi Diklat"
                                    required>
                            </div>
                        </div>
                    </div>


                    <!-- <div class="table-repsonsive" id="insert_form">
     <span id="error"></span>
     <table class="table table-bordered" id="item_table">
      <tr>
       <th>Enter Item Name</th>
       <th>Enter Quantity</th>
       <th>Select Unit</th>
       <th><button type="button" name="add" class="btn btn-success btn-sm add"><span class="fa fa-plus"></span></button></th>
      </tr>
     </table>
     <div align="center">
      <input type="submit" name="submit" class="btn btn-info" value="Insert" />
     </div>
    </div> -->



                </div>
                <div class="card-action" align="center">
                    <button type="submit" name="publish" id="tambah_diklat" class="btn btn-success">
                        <i class="fa fa-save"></i>&nbsp;
                        Simpan
                    </button>
                    <button class="btn btn-default">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#tipe').change(function() {
        var id = $(this).val();
        console.log(id);
        $.ajax({
            url: "<?php echo base_url('Master/get_materi');?>",
            method: "GET",
            data: {
                id: id
            },
            // async: true,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;
                for (i = 0; i < data.length; i++) {
                    html += '<option value=' + data[i].id + '>' + data[i]
                        .mapel + '</option>';
                }
                $('#materi').html(html);

            }
        });
        return false;
    });

});



$(document).ready(function(){
 
 $(document).on('click', '.add', function(){
  var html = '';
  html += '<tr>';
  html += '<td><input type="text" name="item_name[]" class="form-control item_name" /></td>';
  html += '<td><select class="form-control" id="materi" name="materi[]"><option>No Selected</option></select></td>';
  html += '<td><select name="item_unit[]" class="form-control item_unit"><option value="">Select Unit</option><?php foreach ($dosen as $dosen) { echo '<option value="'.$dosen->id.'">'. strtoupper($dosen->nama).'</option>';}?></select></td>';
  html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="fa fa-minus"></span></button></td></tr>';
  $('#item_table').append(html);
 });
 
 $(document).on('click', '.remove', function(){
  $(this).closest('tr').remove();
 });
 
 $('#insert_form').on('submit', function(event){
  event.preventDefault();
  var error = '';
  $('.item_name').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Enter Item Name at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  
  $('.item_quantity').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Enter Item Quantity at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  
  $('.item_unit').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Select Unit at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  var form_data = $(this).serialize();
  if(error == '')
  {
   $.ajax({
    url:"insert.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     if(data == 'ok')
     {
      $('#item_table').find("tr:gt(0)").remove();
      $('#error').html('<div class="alert alert-success">Item Details Saved</div>');
     }
    }
   });
  }
  else
  {
   $('#error').html('<div class="alert alert-danger">'+error+'</div>');
  }
 });
 
});




</script>