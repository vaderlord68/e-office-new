<?php $__env->startSection('document-list'); ?>
   <div id="bootstrap-data-table_wrapper"
        class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer table-documentary" style="padding-left: 0px; padding-right: 0px;">
      <div class="row">
         <div class="col-sm-12">
            <table id="bootstrap-data-table"
                   class="table table-striped table-bordered dataTable no-footer table-hover" role="grid"
                   aria-describedby="bootstrap-data-table_info">
               <thead>
               <tr role="row">
                  <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                      rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"
                      style="width: 20%">Tên
                  </th>
                  <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                      rowspan="1" colspan="1"
                      style="width: 10%;">Mô tả
                  </th>
                  <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                      rowspan="1" colspan="1"
                      style="width: 10%;">Người tạo
                  </th>
                  <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                      rowspan="1" colspan="1"
                      style="width: 10%;">Ngày tạo
                  </th>
                  <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                      rowspan="1" colspan="1"
                      style="width: 10%;">Người sửa cuối
                  </th>
                  <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                      rowspan="1" colspan="1"
                      style="width: 10%;">Ngày sửa cuối
                  </th>
               </tr>
               </thead>
               <tbody>

               <tr role="row" class="odd bi-table-item type-folder">
                  <td>dfsdfs</td>
                  <td>sdfdsfs</td>
                  <td>dfsdf</td>
                  <td>sdfsdf</td>
                  <td>sdfdsf</td>
                  <td>sdfdsf</td>
               </tr>
               </tbody>
               <tfoot class="hide">
               <tr role="row" class="odd bi-table-item type-folder">
                  <td colspan="6">
                     <div class="alert  alert-warning alert-dismissible fade show" role="alert">
                        <span class="badge badge-pill badge-warning">Lưu ý</span> Thư mục này trống
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                  </td>
               </tr>
               </tfoot>
            </table>
         </div>
      </div>
   </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('system.module.W76.W76F2150.components.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>