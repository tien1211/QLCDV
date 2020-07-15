@extends('admin.layout.master')
@section('admin_content')
 
 <!-- page start-->

 <div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                Dropzone
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-cog"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                 </span>
            </header>
            <div class="panel-body">
                <form id="upload" method="post" action="upload.php" enctype="multipart/form-data">
                    <div id="drop">
                        Drop Here
                        <a>Browse</a>
                        <input type="file" name="upl" multiple="">
                    </div>

                    <ul>
                        <!-- The file uploads will be shown here -->
                    </ul>

                </form>
            </div>
        </section>
    </div>
</div>
<!-- page end-->

@endsection