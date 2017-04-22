<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Users account
        <small>show registered users account</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Users</a></li>
        <li class="active">List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">User List</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><abbr title="device ip address"><?= $this->Paginator->sort('username') ?></abbr></th>
                <th><abbr title="access point ip"><?= $this->Paginator->sort('password') ?></abbr></th>
                <th><abbr title="session started date"><?= $this->Paginator->sort('device') ?></abbr></th>
                <th><abbr title="session expire date"><?= $this->Paginator->sort('group_id') ?></abbr></th>
                <th><abbr title="unlock expired session date"><?= $this->Paginator->sort('enabled') ?></abbr></th>
                <th><abbr title="device browser"><?= $this->Paginator->sort('created') ?></abbr></th>
                <th><abbr title="device operating system"><?= $this->Paginator->sort('modified') ?></abbr></th>
                <th class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($users as $user): ?>
                <tr>
                <td><?= $this->Number->format($user->id) ?></td>
                <td><?= h($user->username) ?></td>
                <td><?= h($user->password) ?></td>
                <td><?= h($user->device) ?></td>
                <td><?= $user->has('group') ? $this->Html->link($user->group->name, ['controller' => 'Groups', 'action' => 'view', $user->group->id]) : '' ?></td>
                <td><?php if (h($user->enabled)==true) echo "Yes"; else echo "No"; ?></td>
                <td><?= h($user->created) ?></td>
                <td><?= h($user->modified) ?></td>
                
                <td class="actions">
                    <abbr title="View">
                        <?= $this->Html->link(__("<small class='label bg-green'><i class='fa fa-info'></i></small>"), ['action' => 'view', $user->id], ['escape' => false], ['escape' => false]) ?>
                    </abbr>
                    <abbr title="Edit">
                        <?= $this->Html->link(__("<small class='label bg-yellow'><i class='fa fa-edit'></i></small>"), ['action' => 'edit', $user->id], ['escape' => false]) ?>
                    </abbr>
                    <abbr title="Delete">
                        <?php if($user->username!='guest' && $user->id!=2): ?>
                            <?= $this->Form->postLink(__("<small class='label bg-red'><i class='fa fa-trash-o'></i></small>"), ['action' => 'delete', $user->id], ['escape' => false, 'confirm' => __('Are you sure you want to delete user {0}?', $user->username)]) ?>
                        <?php endif ?>
                    </abbr>
                </td>
            </tr>
            <?php endforeach; ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
             <div class="paginator">
                    <ul class="pagination">
                        <?= $this->Paginator->first('<< ' . __('first')) ?>
                        <?= $this->Paginator->prev('< ' . __('previous')) ?>
                        <?= $this->Paginator->numbers() ?>
                        <?= $this->Paginator->next(__('next') . ' >') ?>
                        <?= $this->Paginator->last(__('last') . ' >>') ?>
                    </ul>
                    <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
                </div>
        </div>
      </div>
    </section>
    <!-- /.content -->

