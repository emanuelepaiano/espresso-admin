<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sessions List
        <small>show connected status devices</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Sessions</a></li>
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
              <h3 class="box-title">Logged devices</h3>

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
                <th><abbr title="device mac address"><?= $this->Paginator->sort('mac device') ?></abbr></th>
                <th><abbr title="device ip address"><?= $this->Paginator->sort('ip address') ?></abbr></th>
                <th><abbr title="access point ip"><?= $this->Paginator->sort('access point') ?></abbr></th>
                <th><abbr title="session started date"><?= $this->Paginator->sort('login date') ?></abbr></th>
                <th><abbr title="session expire date"><?= $this->Paginator->sort('expire date') ?></abbr></th>
                <th><abbr title="unlock expired session date"><?= $this->Paginator->sort('next login') ?></abbr></th>
                <th><abbr title="device browser"><?= $this->Paginator->sort('browser') ?></abbr></th>
                <th><abbr title="device operating system"><?= $this->Paginator->sort('os') ?></abbr></th>
                <th><abbr title="device ip address"><?= $this->Paginator->sort('user_id') ?></abbr></th>
                <th class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($sessions as $session): ?>
                <tr>
                <td><?= $this->Number->format($session->id) ?></td>
                <td><?= h($session->device) ?></td>
                <td><?= h($session->ip) ?></td>
                <td><?= h($session->ap) ?></td>
                <td><?= h($session->lastlog) ?></td>
                <td><?= h($session->expire) ?></td>
                <td><?= h($session->remove) ?></td>
                <td><?= h($session->browser) ?></td>
                <td><?= h($session->os) ?></td>
                <td><?= $session->has('user') ? $this->Html->link($session->user->username, ['controller' => 'Users', 'action' => 'view', $session->user->id]) : '' ?></td>
                <td class="actions">
                    <abbr title="View">
                        <?= $this->Html->link(__("<small class='label bg-green'><i class='fa fa-info'></i></small>"), ['action' => 'view', $session->id], ['escape' => false]) ?>
                    </abbr>
                    <abbr title="Edit">
                        <?= $this->Html->link(__("<small class='label bg-yellow'><i class='fa fa-edit'></i></small>"), ['action' => 'edit', $session->id], ['escape'=>false]) ?>
                    </abbr>
                    <abbr title="Delete">
                        <?= $this->Form->postLink(__("<small class='label bg-red'><i class='fa fa-trash-o'></i></small>"), ['action' => 'delete', $session->id], ['escape' => false, 'confirm' => __('Are you sure you want to delete session ID {0}?', $session->id)]) ?>
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

