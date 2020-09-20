
<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    
   
 <script>
        jQuery(document).ready(function($){
            $('#mymodal').on('show.bs.modal', function(e){
                var button = $(e.relatedTarget); //mengambil data yang sudah di lempar di file show
                var modal = $(this);

                modal.find('.modal-body').load(button.data("remote")); //data yang di ambil akan di tampilkan di class modal body
                modal.find('.modal-title').html(button.data("title")); //modal titel untuk menampilkan nama titel yang sudah di berikan di halaman index tadi
            });
        });
    </script>
    <div class="modal" id="mymodal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <i class="fa fa-spinner fa-spin"></i> <!-- jika data kosong maka akan menampilkan spinner -->
                </div>
            </div>
        </div>
    </div>