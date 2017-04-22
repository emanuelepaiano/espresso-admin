<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Backend account
        <small>show power users account</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Administrators</a></li>
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
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('email') ?></th>
                <th><?= $this->Paginator->sort('password') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
                
                </tr>
                 <?php foreach ($administrators as $administrator): ?>
                <tr>
                <td><?= $this->Number->format($administrator->id) ?></td>
                <td><?= h($administrator->name) ?></td>
                <td><?= h($administrator->email) ?></td>
                <td>******</td>
                <td><?= h($administrator->created) ?></td>
                <td><?= h($administrator->modified) ?></td>
                
                <td class="actions">
                    <abbr title="View">
                        <?= $this->Html->link(__("<small class='label bg-green'><i class='fa fa-info'></i></small>"), ['action' => 'view', $administrator->id], ['escape' => false], ['escape' => false]) ?>
                    </abbr>
                    <abbr title="Edit">
                        <?= $this->Html->link(__("<small class='label bg-yellow'><i class='fa fa-edit'></i></small>"), ['action' => 'edit', $administrator->id], ['escape' => false]) ?>
                    </abbr>
                    <?php if(count($administrators)>1): ?>
                        <abbr title="Delete">
                            <?= $this->Form->postLink(__("<small class='label bg-red'><i class='fa fa-trash-o'></i></small>"), ['action' => 'delete', $administrator->id], ['escape' => false, 'confirm' => __('Are you sure you want to delete administrator {0}?', $administrator->name)]) ?>
                        </abbr>
                     <?php endif ?>
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

