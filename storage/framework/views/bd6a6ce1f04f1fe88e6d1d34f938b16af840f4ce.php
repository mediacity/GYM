      <div class="admin-table-action-block">
              <!-- Delete Modal -->
                          <button type="button" class="btn btn-xm btn-danger-rgba" data-toggle="modal" data-target="#deleteModal<?php echo e($id); ?>"><i class="feather icon-trash"></i></button>
                          <!-- Modal -->
                          <div id="deleteModal<?php echo e($id); ?>" class="delete-modal modal fade" role="dialog">
                            <div class="modal-dialog modal-sm">
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <div class="delete-icon"></div>
                                </div>
                                <div class="modal-body text-center">
                                  <h4 class="modal-heading"><?php echo e(__("Are You Sure ?")); ?></h4>
                                  <p><?php echo e(__("Do you really want to delete these records? This process cannot be undone.")); ?></p>
                                </div>
                                <div class="modal-footer">
                                   <?php echo Form::open(['method' => 'DELETE', 'route' => ['multicurrency.destroy', $id]]); ?>

                                      <button type="reset" class="btn btn-dark" data-dismiss="modal"><?php echo e(__("No")); ?></button>
                                      <button type="submit" class="btn btn-danger"><?php echo e(__("Yes")); ?></button>
                                  <?php echo Form::close(); ?>

                                   </div>
                              </div>
                            </div>
                          </div><?php /**PATH C:\laragon\www\GYM\resources\views/admin/multicurrency/action.blade.php ENDPATH**/ ?>