
<!-- Start Breadcrumbbar -->
<?php $__env->startSection('title',__('Add Todo')); ?>
<?php $__env->startSection('maincontent'); ?>
<?php $__env->startComponent('components.breadcumb',['thirdactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Todo')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Board')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu2'); ?>
<?php echo e(__('All Board')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('button'); ?>
<?php if(Auth::user()->roles->first()->name == 'Trainer' || Auth::user()->roles->first()->name == 'Super Admin' ): ?>
<div class="col-md-12 col-lg-6 text-right">
    <div class="top-btn-block">
        <a href="<?php echo e(\Request::is('admin/todo') ? '#' : url('admin/todo')); ?>" class="btn btn-primary-rgba mr-2"
        id="show"><i class="feather icon-plus mr-2"></i><?php echo e(__("Add Board")); ?></a>
        <a href="<?php echo e(url('admin/todoboard')); ?>" class="btn btn-danger-rgba mr-2"><i
        class="feather icon-list mr-2"></i><?php echo e(__("All Boards")); ?></a>
    </div> 
</div>
<?php endif; ?>
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<div class="contentbar">
    <div class="row add-form <?php echo e(\Request::is('admin/todo') ? 'hide-block' : ''); ?>">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="close-sign"><a href="<?php echo e(request()->is('admin/todoboard/*') ? url('admin/todo') : '#'); ?>"
                            class="btn btn-info btn-sm pull-right" id="hide"><i class="fa fa-close"></i></a></div>
                    <?php if(isset($todoboard)): ?>
                    <h5 class="card-title"><?php echo e(__("Edit Board")); ?></h5>
                    <?php echo Form::model($todoboard, ['method' => 'PATCH', 'route' => ['todoboard.update',
                    $todoboard->id],'files'=>'true']); ?>

                    <?php else: ?>
                    <h5 class="card-title"><?php echo e(__("Add Board")); ?></h5>
                    <?php echo Form::open(['method' => 'POST', 'route' => 'todoboard.store','files'=>'true']); ?>

                    <?php endif; ?>
                    <?php echo Form::hidden('created_by', $auth->id, ['class' => 'form-control','required']); ?>

                    <div class="row">
                        <div class="<?php echo e($auth->role_id == 'Super Admin' ? 'col-lg-4' : 'col-lg-8'); ?> col-sm-12">
                            <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('title', 'Title',['class'=>'required']); ?>

                                <?php echo Form::text('title', null, ['class' =>
                                'form-control','required','placeholder'=>'Enter Title']); ?>

                                <small class="text-danger"><?php echo e($errors->first('title')); ?></small>
                            </div>
                        </div>
                         <div class="col-lg-4 col-sm-12">
                            <div class="form-group<?php echo e($errors->has('assigned_to') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('assigned_to', 'Assigned To'); ?>

                                <?php echo Form::select('assigned_to', $users, null, ['class' => 'select2
                                form-control','placeholder' => 'Please Select']); ?>

                                <small class="text-danger"><?php echo e($errors->first('assigned_to')); ?></small>
                            </div>
                        </div>
                      </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-12">
                            <div class="form-group<?php echo e($errors->has('is_public') ? ' has-error' : ''); ?>">
                                <div class="row">
                                    <div class="col-lg-5 col-5">
                                        <?php echo Form::label('is_public', 'If Public Board'); ?>

                                    </div>
                                    <div class="col-lg-2 col-5 custom-switch">
                                        <?php echo Form::checkbox('is_public', 1, isset($todoboard) ? $todoboard->is_public :
                                        0, ['class' => 'custom-control-input']); ?>

                                        <label class="custom-control-label" for="is_public"></label>
                                    </div>
                                </div>
                                <small class="text-info"><?php echo e(__("** If public, this board will show to everyone.")); ?></small>
                                <small class="text-danger"><?php echo e($errors->first('is_public')); ?></small>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-12">
                            <div class="form-group<?php echo e($errors->has('todo_active') ? ' has-error' : ''); ?>">
                                <div class="row">
                                    <div class="col-lg-5 col-5">
                                        <?php echo Form::label('todo_active', 'Status'); ?>

                                    </div>
                                    <div class="col-lg-2 col-2 custom-switch">
                                        <?php echo Form::checkbox('todo_active', 1, isset($todoboard) ? $todoboard->is_active :
                                        1, ['class' => 'custom-control-input']); ?>

                                        <label class="custom-control-label" for="todo_active"></label>
                                    </div>
                                </div>
                                <small class="text-danger"><?php echo e($errors->first('todo_active')); ?></small>
                            </div>
                        </div>
                        <div class="col-lg-8 col-sm-12">
                            <div class="form-group">
                                <?php if(isset($todoboard)): ?>
                                <button type="submit" class="btn btn-success"><?php echo e(__("Update")); ?></button>
                                <?php else: ?>
                                <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                                <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                                    <?php echo e(__("Create")); ?></button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <?php if(isset($boards)): ?>
        <?php $__currentLoopData = $boards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-xl-3 col-lg-4 col-sm-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <div class="header-info inline">
                        <?php if(isset($item) && $item->created_by == $auth->id || $auth->role_id == 1): ?>
                        <div class="inline pull-right">
                            <a href="<?php echo e(route('todoboard.edit', $item->id)); ?>" class="text-success mr-2"
                                title="Edit <?php echo e($item->title); ?>"><i class="feather icon-edit-2"></i></a>
                            <a href="#" class="deletemodal text-danger" data-toggle="modal" data-target="#deleteModal"
                                data-id="<?php echo e($item->id); ?>" data-url="<?php echo e(url('/admin/todoboard')); ?>" title="Delete"><i
                                    class="feather icon-trash"></i></a>
                        </div>
                        <?php endif; ?>
                        <h5 class="card-title mb-0"><b><?php echo e(ucfirst($item->title)); ?></b>
                            <?php if($item->is_public == 1): ?>
                            <span class="badge badge-info font-10 m-l-5"><?php echo e(__("Public")); ?></span>
                            <?php endif; ?>
                        </h5>
                         <?php if($item->assigned_to != null): ?>
                        <small class=""><i class="fa fa-user mr-2"></i><?php echo e(ucfirst($item->user->name)); ?>,</small>
                        <small class=""><?php echo e(ucfirst($item->assignedto->name ?? '-')); ?></small>
                        <?php endif; ?>
                        <?php if($item->is_public == 1): ?>
                        <small class=""><i class="fa fa-user mr-2"></i><?php echo e(__("By")); ?> <?php echo e(ucfirst($item->user->name)); ?></small>
                        <?php endif; ?>
                    </div>
                    
                 </div>
                <div class="card-body todo-board">
                    <div id="kanban-board-<?php echo e($item->id); ?>">
                        <?php $__empty_1 = true; $__currentLoopData = $item->cards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="card bg-primary-rgba m-b-20">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-8">
                                        <div class="todo-cursor" data-toggle="modal"
                                            data-target="#tasksModal<?php echo e($card->id); ?>">
                                            <div class="kanban-tag">
                                                <h5 class="mb-0">
                                                    <?php echo e($card->name); ?>

                                                </h5>
                                                <small>
                                                    <i class="feather icon-eye"></i>
                                                    (<?php echo e($card->tasks()->where('is_complete','1')->count()); ?>/<?php echo e($card->tasks()->count()); ?>)
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="kanban-menu">
                                            <div class="dropdown">
                                                <button class="btn btn-link p-0 m-0 border-0 l-h-20 font-16"
                                                    type="button" id="KanbanBoardButton2" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false"><i
                                                        class="feather icon-more-vertical-"></i></button>
                                                <div class="dropdown-menu dropdown-menu-right"
                                                    aria-labelledby="KanbanBoardButton2">

                                                    <a data-card_detail="<?php echo e($card->detail); ?>"
                                                        data-cardtitle="<?php echo e($card->name); ?>" data-cardid="<?php echo e($card->id); ?>"
                                                        data-toggle="modal" data-target="#editcard"
                                                        class="dropdown-item" href="#"><i
                                                            class="feather icon-edit-2 mr-2"></i><?php echo e(__("Edit")); ?></a>

                                                    <a data-cardid="<?php echo e($card->id); ?>" data-cardtitle="<?php echo e($card->name); ?>"
                                                        data-toggle="modal" data-target="#deleteModalForCard"
                                                        class="dropdown-item" href="#"><i
                                                            class="feather icon-trash mr-2"></i><?php echo e(__("Delete")); ?></a>
                                                        </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <div id="tasksModal<?php echo e($card->id); ?>" class="modal fade" tabindex="-1" role="dialog"
                                    aria-labelledby="my-modal-title" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="my-modal-title">
                                                    <?php echo e($card->name); ?> (<?php echo e($card->tasks()->where('is_complete','1')->count()); ?>/<?php echo e($card->tasks()->count()); ?>)
                                                    <br>
                                                    <small><?php echo e(__("in list ")); ?><?php echo e($card->board->title); ?></small>
                                                </h5>
                                                <button class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <?php if($card->detail != ''): ?>
                                                <div class="bg-secondary-rgba p-3 text-dark">
                                                    <?php echo e($card->detail); ?>

                                                </div>
                                                <br>
                                                <?php endif; ?>
                                                <?php $__empty_2 = true; $__currentLoopData = $card->tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $todo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                                <div class="card border-light bg-white-rgba m-b-20">
                                                    <div class="card-body">
                                                        <div class="float-right kanban-menu">
                                                            <?php if($todo->created_by == $auth->id || $auth->role_id == 1): ?>
                                                            <div class="dropdown">
                                                                <button class="btn btn-link p-0 m-0 border-0 font-14"
                                                                    type="button" id="KanbanBoardButton1"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false"><i
                                                                        class="feather icon-more-vertical-"></i></button>
                                                                <div class="dropdown-menu dropdown-menu-right font-14"
                                                                    aria-labelledby="KanbanBoardButton1">
                                                                    <a href="#" class="dropdown-item todo-editbtn"
                                                                        data-toggle="modal" data-id="<?php echo e($todo->id); ?>"
                                                                        title="Edit"><i
                                                                            class="feather icon-edit-2 mr-2"></i><?php echo e(__("Edit")); ?></a>
                                                                    <a href="#" class="dropdown-item deletemodal"
                                                                        data-toggle="modal" data-dismiss="modal" data-target="#deleteModal"
                                                                        data-id="<?php echo e($todo->id); ?>" title="Delete"><i
                                                                            class="feather icon-trash mr-2"></i><?php echo e(__("Delete")); ?></a>
                                                                </div>
                                                            </div>
                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="kanban-tag inline p-20">
                                                            <p><?php echo e($todo->task); ?></p>
                                                        </div>

                                                        <div class="kanban-footer-block m-t-5">
                                                            <div class="row g-0">
                                                                <div class="col-lg-3 kanban-left-footer">

                                                                    <?php if($todo->priority == 'h'): ?>
                                                                    <span class="badge badge-danger-inverse font-10"><?php echo e(__("High")); ?></span>
                                                                    <?php elseif($todo->priority == 'm'): ?>
                                                                    <span class="badge badge-success-inverse font-10"><?php echo e(__("Medium")); ?></span>
                                                                    <?php elseif($todo->priority == 'l'): ?>
                                                                    <span class="badge badge-info-inverse font-10"><?php echo e(__("Low")); ?></span>
                                                                    <?php endif; ?>
                                                                </div>
                                                                <div class="col-lg-6 kanban-center-footer">
                                                                    <?php if($todo->is_checked != 1 && $todo->due_on != null): ?>
                                                                    <small class="text-danger"><?php echo e(__("Due :")); ?>

                                                                        <?php echo e(date('jS M Y', strtotime($todo->due_on))); ?></small>
                                                                    <?php endif; ?>
                                                                </div>
                                                                <?php if($item->is_public != 1): ?>
                                                                <div class="col-lg-3 kanban-footer text-right">
                                                                    <?php echo Form::open(['method' => 'POST', 'route' =>
                                                                    ['todo.status', $todo->id]]); ?>

                                                                    <input type="hidden" name="type" value="1">
                                                                    <div class="custom-control custom-checkbox"
                                                                        data-toggle="tooltip"
                                                                        data-original-title="Complete">
                                                                        <?php echo Form::checkbox('is_complete', 1,
                                                                        $todo->is_complete == 1 ? 1 : 0,
                                                                        ['id' => 'complete'.$todo->id, 'class' =>
                                                                        'todo-status
                                                                        custom-control-input']); ?>

                                                                        <label class="custom-control-label"
                                                                            for="complete<?php echo e($todo->id); ?>"></label>
                                                                    </div>
                                                                    <?php echo Form::close(); ?>

                                                                    <?php if($item->assigned_to != null): ?>
                                                                    <?php echo Form::open(['method' => 'POST', 'route' =>
                                                                    ['todo.status', $todo->id]]); ?>

                                                                    <input type="hidden" name="type" value="2">
                                                                    <div class="custom-control custom-checkbox"
                                                                        data-toggle="tooltip"
                                                                        data-original-title="Checked & Complete">
                                                                        <?php echo Form::checkbox('is_checked', 1,
                                                                        $todo->is_checked == 1 ? 1 : 0,
                                                                        ['id' => 'checked'.$todo->id, 'class' =>
                                                                        'todo-status
                                                                        custom-control-input', $auth->id !=
                                                                        $item->created_by && $auth->role_id
                                                                        != 1 ? 'disabled' : '']); ?>

                                                                        <label
                                                                            class="custom-control-label complete-checkbox"
                                                                            for="checked<?php echo e($todo->id); ?>"></label>
                                                                    </div>
                                                                    <?php echo Form::close(); ?>

                                                                    <?php endif; ?>
                                                                </div>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                                <div class="card bg-warning-rgba m-b-20">
                                                    <div class="card-body">
                                                        <div class="text-center kanban-tag inline p-20">
                                                            <h6 class="mt-2"> <i class="feather icon-github"></i>
                                                                <?php echo e(__("No Tasks in this card  ")); ?></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endif; ?>
                                                <div class="task-block">
                                                    <div class="p-1 add-task-block hide-block border">
                                                        <?php echo Form::open(['method' => 'POST', 'route' => 'todo.store']); ?>

                                                        <input type="hidden" name="board_id" value="<?php echo e($item->id); ?>">
                                                        <input type="hidden" name="created_by" value="<?php echo e($auth->id); ?>">
                                                        <input type="hidden" name="is_active" value="1">
                                                        <div class="row">
                                                           
                                                            <div class="col-sm-12">
                                                                <div
                                                                    class="form-group <?php echo e($errors->has('task') ? ' has-error' : ''); ?> m-b-10">
                                                                    <?php echo Form::label('task', 'Add Task',['class'=>'required font-13']); ?>

                                                                    <?php echo Form::text('task', null, ['class' => 'form-control','required']); ?>

                                                                    <small class="text-danger"><?php echo e($errors->first('task')); ?></small>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-7 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="text-dark" for="calendar"><?php echo e(__("Due On")); ?></label>
                                                                    <div class="input-group">
                                                                        <input value="<?php echo e(old('due_on')); ?>" class="form-control calendar" type="text"
                                                                            id="" name="due_on">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text" id="basic-addon2"><i
                                                                                    class="feather icon-calendar"></i></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-5 col-sm-12">
                                                                <div
                                                                    class="form-group<?php echo e($errors->has('priority') ? ' has-error' : ''); ?> m-b-10">
                                                                    <?php echo Form::label('priority', 'Priority',['class'=>'required font-13']); ?>

                                                                    <?php echo Form::select('priority', ['h' => 'high', 'm' => 'Medium', 'l' =>
                                                                    'Low'],
                                                                    'm', ['required' => 'required','class' => 'form-control','placeholder'
                                                                    =>
                                                                    'Please Select']); ?>

                                                                    <small class="text-danger"><?php echo e($errors->first('priority')); ?></small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" value="<?php echo e($card->id); ?>" name="card_id">
                                                        <button type="submit" class="btn btn-info-rgba btn-block btn-lg font-16"><i
                                                                class="fa fa-check-circle mr-2"></i><?php echo e(__("Add Task")); ?></button>
                                                        <?php echo Form::close(); ?>

                                                    </div>
                                                    <?php if($item->cards()->count()): ?>
                                                    <button type="button"
                                                        class="add-task-btn btn btn-primary-rgba btn-block btn-lg font-16"><i
                                                            class="feather icon-plus mr-2"></i><?php echo e(__("Add Task")); ?></button>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" data-dismiss="modal" class="btn btn-dark-rgba btn-md">
                                                    <?php echo e(__("Close")); ?>

                                                </button>
                                                <button data-cardid="<?php echo e($card->id); ?>" data-cardtitle="<?php echo e($card->name); ?>" data-toggle="modal" data-target="#deleteModalForCard" type="button" data-dismiss="modal" class="btn btn-danger-rgba btn-md">
                                                    <?php echo e(__("Delete Card")); ?>

                                                </button>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="task-block">
                                <div class="p-1 add-task-block hide-block border">
                                    <?php echo Form::open(['method' => 'POST', 'route' => 'todo.store']); ?>

                                    <input type="hidden" name="board_id" value="<?php echo e($item->id); ?>">
                                    <input type="hidden" name="created_by" value="<?php echo e($auth->id); ?>">
                                    <input type="hidden" name="is_active" value="1">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div
                                                class="form-group <?php echo e($errors->has('task') ? ' has-error' : ''); ?> m-b-10">
                                                <?php echo Form::label('task', 'Add Task',['class'=>'required font-13']); ?>

                                                <?php echo Form::text('task', null, ['class' => 'form-control','required']); ?>

                                                <small class="text-danger"><?php echo e($errors->first('task')); ?></small>
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-sm-12">
                                            <div class="form-group">
                                                <label class="text-dark" for="calendar"><?php echo e(__("Due On")); ?></label>
                                                <div class="input-group">
                                                    <input value="<?php echo e(old('due_on')); ?>" class="form-control calendar" type="text"
                                                        id="calendar1" name="due_on">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="basic-addon2"><i
                                                                class="feather icon-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-sm-12">
                                            <div
                                                class="form-group<?php echo e($errors->has('priority') ? ' has-error' : ''); ?> m-b-10">
                                                <?php echo Form::label('priority', 'Priority',['class'=>'required font-13']); ?>

                                                <?php echo Form::select('priority', ['h' => 'high', 'm' => 'Medium', 'l' =>
                                                'Low'],
                                                'm', ['required' => 'required','class' => 'form-control','placeholder'
                                                =>
                                                'Please Select']); ?>

                                                <small class="text-danger"><?php echo e($errors->first('priority')); ?></small>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" value="<?php echo e($card->id); ?>" name="card_id">
                                    <button type="submit" class="btn btn-info-rgba btn-block btn-lg font-16"><i
                                            class="fa fa-check-circle mr-2"></i><?php echo e(__("Add Task")); ?></button>
                                    <?php echo Form::close(); ?>

                                </div>
                                <?php if($item->cards()->count()): ?>
                                <button type="button"
                                    class="add-task-btn btn btn-primary-rgba btn-block btn-lg font-16"><i
                                        class="feather icon-plus mr-2"></i><?php echo e(__("Add Task")); ?></button>
                                <?php endif; ?>
                            </div>
                         </div>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="card bg-warning-rgba m-b-20">
                            <div class="card-body">
                                <div class="text-center kanban-tag inline p-20">
                                    <p><?php echo e(__("This Board is empty add some cards to fill it ☺ ")); ?></p>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                    <button type="button" data-toggle="modal" data-target="#add_cards" 
                        data-boardname="<?php echo e($item->title); ?>" data-boardid="<?php echo e($item->id); ?>"
                        class="add_card_btn mt-2 btn btn-primary-rgba btn-block btn-lg font-16"><i
                            class="feather icon-layout mr-2"></i><?php echo e(__("Add Card")); ?></button>
                        </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>
</div>
<!-- Modal -->
<div id="todoeditModal" class="edit-modal modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo e(__("Edit Task")); ?></h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="delete-icon"></div>
            </div>
            <div class="todo-edit-modal modal-body">
            </div>
        </div>
    </div>
</div>
<div id="deleteModal" class="delete-modal modal fade" role="dialog">
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
                <?php echo Form::open(['method' => 'DELETE', 'url' => url('admin/todo'),'id' => 'deleteform']); ?>

                <button type="reset" class="btn btn-dark" data-dismiss="modal"><?php echo e(__("No")); ?></button>
                <button type="submit" class="btn btn-danger"><?php echo e(__("Yes")); ?></button>
                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
</div>
<div id="deleteModalForCard" class="delete-modal modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo e(__("Title")); ?>}</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="delete-icon"></div>
            </div>
            <div class="modal-body text-center">
                <h4 class="modal-heading"><?php echo e(__("Are You Sure ?")); ?></h4>
                <p><?php echo e(__("Do you really want to delete these card? This process cannot be undone.")); ?></p>
            </div>
            <div class="modal-footer">
                <form action="<?php echo e(route('todocard.delete')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <input type="hidden" value="" name="card_id" id="delete_card_id">
                    <button type="reset" class="btn btn-dark" data-dismiss="modal"><?php echo e(__("No")); ?></button>
                    <button type="submit" class="btn btn-danger"><?php echo e(__("Yes")); ?></button>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="add_cards" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add_modal_title"></h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('todocard.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                         <label><?php echo e(__("Title:")); ?> <span class="text-danger">*</span></label>
                        <input type="text" required class="form-control" name="name" value="<?php echo e(old("name")); ?>">
                    </div>
                    <div class="form-group">
                        <label><?php echo e(__("Description:")); ?> </label>
                        <textarea class="form-control" rows="5" name="detail"><?php echo e(old('detail')); ?></textarea>
                    </div>
                     <input type="hidden" name="board_id" value="" id="board_id">
                      <div class="form-group">
                        <button type="submit" class="btn btn-md btn-primary-rgba">
                            <?php echo e(__("Create")); ?>

                        </button>
                         <button type="button" data-dismiss="modal" class="btn btn-md btn-danger-rgba">
                            <?php echo e(__("Cancel")); ?>

                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="editcard" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title"><?php echo e(__("Title")); ?></h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('todocard.update')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label><?php echo e(__("Title: ")); ?><span class="text-danger">*</span></label>
                        <input id="card_name" type="text" required class="form-control" name="name"
                            value="<?php echo e(old("name")); ?>">
                    </div>

                    <div class="form-group">
                        <label><?php echo e(__("Description:")); ?> </label>
                        <textarea id="card_detail" class="form-control" rows="5"
                            name="detail"><?php echo e(old('detail')); ?></textarea>
                    </div>

                    <input type="hidden" name="card_id" value="" id="card_id">
                    <div class="form-group">
                        <button type="submit" class="btn btn-md btn-primary-rgba">
                            <?php echo e(__("Update")); ?>

                        </button>
                         <button type="button" data-dismiss="modal" class="btn btn-md btn-danger-rgba">
                            <?php echo e(__("Cancel")); ?>

                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Contentbar -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $('.add_card_btn').on('click',function(){

            var boardid = $(this).data('boardid');
            var boardname = $(this).data('boardname');

            $('#board_id').val(boardid);
            $('#add_modal_title').text(boardname);

        })
    </script>
    <script>
        $('.calendar').each(function () {
            $(this).datepicker({
                dateFormat: 'yy-mm-dd',
                minDate: 0
            });
        });
    
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\GYM\gym_new\resources\views/admin/todo/todo.blade.php ENDPATH**/ ?>