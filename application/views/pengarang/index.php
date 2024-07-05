<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Pengarang</title>
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/layout.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-success">
            <div class="container-fluid">
                <a href="#" class="navbar-brand">Data Perpustakaan</a>
                <div class="collpase navbar-collapse align-items-center justify-content-md-end">
                </div>
            </div>
        </nav>


        <div id="app" class="container-fluid">
            <div class="row">
                <!-- sidebar -->
                <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                    <div class="position-sticky">
                        <a href="<?php echo site_url(); ?>/buku" class="list-group-item list-group-item-action">Data Buku</a>
                        <a href="<?php echo site_url(); ?>/pengarang" class="list-group-item list-group-item-action active">Data Pengarang</a>
                    </div>
                </nav>

                <!-- main content -->
                <main class="col-md-9 col-lg-10 ml-sm-auto px-md-4 py-4">
                    <h3>Dashboard Pengarang </h3>
                    
                    <div class="row">
                        <div class="col-12 col-xs-12 mb-4 mb-lg-0">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button  data-bs-target="#myModal" data-bs-toggle="modal" @click="showModal(null)" class="btn btn-primary">Tambah pengarang</button>
                                        </div>
                                    </div>
                                
                                    <div class="table-responsive">
                                        <table class="table text-center">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Id Pengarang</th>
                                                    <th>Nama Pengarang</th>
                                                    <th>No telepon</th>
                                                    <th>email</th>
                                                    <th>alamat</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody v-for="(row, index) in aData" :key="row.id_pengarang">
                                                <tr>
                                                    <td>{{index + 1}}</td>
                                                    <td>{{row.id_pengarang}}</td>
                                                    <td>{{row.nama_pengarang}}</td>
                                                    <td>{{row.email}}</td>
                                                    <td>{{row.no_telp}}</td>
                                                    <td>{{row.alamat}}</td>
                                                    <td>
                                                        <a href="#"  data-bs-target="#myModal" data-bs-toggle="modal" @click="showModal(row)" class="btn btn-sm btn-success">edit</a>
                                                        <a href="#" @click="hapusdata(row.id_pengarang)" class="btn btn-sm btn-danger">delete</a>
                                                    </td>
                                                </tr>
                                              
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- footer -->
                    <footer class="pt-5 d-flex justify-content-between">
                    <span>Copyright @ 2024 <a href="https://www.instagram.com/a.allooooo/">Azzahra Nur Oktavia</a></span>
                    </footer>
                </main>

            </div>

            <div class="modal" id="myModal">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                    <form class="need-validation">
                        <div class="modal-header bg-success text-white">
                            <h5 class="modal-title" id="exampleModalLabel">{{oData.method == 'post' ? 'tambah' : 'edit'}} Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class=col-md-6>
                                    <label>Id Pengarang</label>
                                    <input type="text" id="id_pengarang" v-model="oData.id_pengarang" class="form-control" required>
                                </div>
                                <div class=col-md-6>
                                    <label>Nama Pengarang</label>
                                    <input type="text" id="nama_pengarang" v-model="oData.nama_pengarang" class="form-control" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class=col-md-6>
                                    <label>No telepon</label>
                                    <input type="number" id="no_telp" v-model="oData.no_telp" class="form-control" required>
                                </div>
                                <div class=col-md-6>
                                    <label>E-Mail</label>
                                    <input type="email" id="email" v-model="oData.email" class="form-control" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class=col-md-6>
                                    <label>Alamat</label>
                                    <input type="text" id="alamat" v-model="oData.alamat" class="form-control" required>
                                </div>
                            </div>
                        </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" @click="simpandata" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
		    </div>

            
        </div>

        <script src="<?php echo base_url();?>assets/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/vue.js"></script>
        <script src="<?php echo base_url();?>assets/js/axios.min.js"></script>
        

        <script>
            var v = new Vue({
                el: "#app",
                data:{
                    apiUrl: '',
                    aData: [],
                    pilihData: {},
                    oData: {
                        id_pengarang: '',
                        nama_pengarang: '', 
                        no_telp: '', 
                        email: '', 
                        alamat: '',
                        method: '',
                    }
                },
                created(){
                    this.showdata();
                },
                methods:{
                    showModal(oRow){
                        if(oRow == null) {
                            this.oData.method = 'post';
                            this.oData.id_pengarang = '';
                            this.oData.nama_pengarang = '';
                            this.oData.no_telp = '';
                            this.oData.email = '';
                            this.oData.alamat = '';
                        }else{
                            this.oData.method = 'put';
                            this.oData.id_pengarang = oRow.id_pengarang;
                            this.oData.nama_pengarang = oRow.nama_pengarang;
                            this.oData.no_telp = oRow.no_telp;
                            this.oData.email = oRow.email;
                            this.oData.alamat = oRow.alamat;
                        }
                        $('#myModal').modal('show');
                    },
                    
                    showdata(){
                        this.apiUrl = "<?php echo base_url();?>index.php/api/";
                        //console.log(this.apiUrl);

                        axios.get(this.apiUrl+'pengarang')
                            .then(response => {
                                this.aData = response.data;
                                //console.log(response.data);
                            })
                            .catch(error=>{
                                console.log(error);
                            });
                    },

                    hapusdata(idx){
                        var konfirmasi = confirm("Data Pengarang dihapus dari database");

                        if(konfirmasi)
                            axios.delete(this.apiUrl+'pengarang/'+idx)
                                .then(response => {
                                    //console.log("Data Berhasil dihapus");
                                    this.showdata();
                                })
                                .catch(error=>{
                                    console.log(error);
                                });
                        else console.log("Data disimpan kembali");
                    },

                    oFormData(obj){
                        var formData = new FormData();
                        for(var key in obj){
                            formData.append(key, obj[key]);
                        }
                        return formData;
                    },

                    oUriFormData(obj) {
                        var formData = new URLSearchParams();
                        for (var key in obj) {
                            formData.append(key, obj[key]);
                        }
                        return formData.toString();
                    },

                    simpandata(){
                        var dt = this.oUriFormData(this.oData);
                        console.log(this.oData);
                        if(this.oData.method == 'post')
                            axios.post(this.apiUrl+'pengarang', dt)
                                .then(response => {
                                    this.showdata();
                                    $('#myModal').modal('hide');
                                    console.log(response.data);
                                })
                                .catch(error=>{
                                    console.log(error);
                                });
                       else{
                            axios.put(this.apiUrl+'pengarang', dt, {
                                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                                })
                                .then(response => {
                                    this.showdata();
                                    $('#myModal').modal('hide');
                                    console.log(response);
                                })
                                .catch(error=>{
                                    console.log(error);
                                });
                        }

                    }
                }

            })
        </script>

                
    </body>
</html>