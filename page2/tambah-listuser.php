<?php
if(isset($_POST["submit"])){
    $a     = mysql_real_escape_string(strip_tags($_POST["nama"]));
    $b     = mysql_real_escape_string(strip_tags($_POST["email"]));
    $c     = mysql_real_escape_string(strip_tags($_POST["username"]));
    $d     = mysql_real_escape_string(strip_tags(MD5($_POST["password"])));
    $e     = mysql_real_escape_string(strip_tags($_POST["level"]));
    $g     = mysql_real_escape_string(strip_tags($_POST["jabatan"]));
    $h     = mysql_real_escape_string(strip_tags($_POST["images"]));

     mysql_query("INSERT INTO user_login VALUES ('','$a','$b','$c','$d','$e','$g','$h')");

     header("location:index.php?listuser&suksestambah");
    } ?>
 <script type="text/javascript">
    function isNumberKeyTgl(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
    //     if (charCode > 31 && (charCode < 47 || charCode > 57))
            return false;

         return true;
      }
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 47 || charCode > 57))
            return false;

         return true;
      }
      </script>
<script type="text/javascript" src="assets/js/bootstrap-filestyle.js"></script>
    <div id="wrapper">
        <!-- /. NAV SIDE  -->
       <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Tambah User</h2>
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
                 <!--<?php if($_SESSION["sessionsim"] == 1){?>
                 <div class="row">
                     <div class="col-md-12">
                        <div class="alert alert-warning">Data Gagal di tambah, saldo tidak cukup...
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                        </div>
                     </div>
                </div>
                 <?php } ?>-->
       <!-- content -->
       <div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Form Tambah user
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form id="validate-me-plz" name="form1" role="form" action="" method="post" enctype="multipart/form-data" >
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3"><label>Nama</label></div>
                                    <div class="col-md-5">
                                        <input class="form-control" id="nama"  name="nama" type="text" placeholder="masukkan nama" data-rule-required="true" data-msg-required="Mohon masukkan nama"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3"><label>Email</label></div>
                                    <div class="col-md-5">
                                        <input class="form-control" id="email"  name="email" type="text" placeholder="masukkan email" data-rule-required="true" data-msg-required="Mohon masukkan email"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3"><label>Username</label></div>
                                    <div class="col-md-5">
                                        <input class="form-control" id="username"  name="username" type="text" placeholder="masukkan username" data-rule-required="true" data-msg-required="Mohon masukkan username"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3"><label>Password</label></div>
                                    <div class="col-md-5">
                                        <input class="form-control" id="password" name="password" type="password" placeholder="masukkan data password" data-rule-required="true" data-msg-required="Mohon masukkan data di kolom Password"/> 
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3"><label>Level</label></div>
                                    <div class="col-md-5">
                                        <select class="form-control" name="level" data-rule-required="true" data-msg-required="Mohon masukkan level">
                                            <option value="">- Pilih -</option>
                                            <option value="sa">Administrator</option>
                                            <option value="us">User</option>
                                            <option value="ma">Manager</option>
                                            <option value="ass">Assman</option>
                                            <option value="ki">Kantor Induk</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3"><label>Level</label></div>
                                    <div class="col-md-5">
                                        <select class="form-control" name="level" data-rule-required="true" data-msg-required="Mohon masukkan level">
                                            <option value="">- Pilih -</option>
                                            <option value="<?php if($rowA['level']=="sa"){ echo "admin";}?>">Admin</option>
                                            <option value="<?php if($rowA['level']=="us"){ echo "user";}?>">User</option>
                                            <option value="<?php if($rowA['level']=="ma"){ echo "manager";}?>">Manager</option>
                                        </select>
                                    </div>
                                </div>
                            </div> --> 
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3"><label>Jabatan</label></div>
                                    <div class="col-md-5">
                                        <input class="form-control" id="jabatan"  name="jabatan" type="text" placeholder="masukkan jabatan" data-rule-required="true" data-msg-required="Mohon masukkan jabatan"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-8">
                                    <button type="submit" name="submit" class="btn btn-large btn-success">Simpan</button>
                                    <a href="index.php?listuser" class="btn btn-large btn-warning">Kembali</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
<script type="text/javascript" src="assets/validasi/jquery.validate.min.js"></script>
<script type="text/javascript">
$('#validate-me-plz').validate({
      rules: {
        field: {
          required: true,
          date: true
        },
        alamat: {
                required: true
                }
        },
        messages: {
            alamat: {
            required: "Mohon masukkan data alamat"
                }
            }

    });
$('#input01').filestyle();
 $('#input01').change(function(){
      var file = $('#input01').val();
      var exts = ['jpg','jpeg'];
      // first check if file field has any value
      if ( file ) {
        // split file name at dot
        var get_ext = file.split('.');
        // reverse name to check extension
        get_ext = get_ext.reverse();
        // check file type is valid as given in 'exts' array
        if ( $.inArray ( get_ext[0].toLowerCase(), exts ) > -1 ){
          return true;
        } else {
          alert('Hanya boleh jpg ');
          $('#input01').filestyle('clear');
        }
      }

    });
 //Place this plugin snippet into another file in your applicationb
(function ($) {
    $.toggleShowPassword = function (options) {
        var settings = $.extend({
            field: "#password",
            control: "#toggle_show_password",
        }, options);

        var control = $(settings.control);
        var field = $(settings.field)

        control.bind('click', function () {
            if (control.is(':checked')) {
                field.attr('type', 'text');
            } else {
                field.attr('type', 'password');
            }
        })
    };
}(jQuery));

//Here how to call above plugin from everywhere in your application document body
$.toggleShowPassword({
    field: '#pass',
    control: '#pass2'
});
</script>
