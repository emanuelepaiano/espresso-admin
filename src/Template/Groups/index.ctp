<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Groups
        <small>show registered users groups</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Groups</a></li>
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
              <h3 class="box-title">Group List</h3>

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
                <th><abbr title="Group Name"><?= $this->Paginator->sort('name') ?></abbr></th>
                <th><abbr title="Surfing time allowing time"><?= $this->Paginator->sort('surfing minutes') ?></abbr></th>
                <th><abbr title="Minutes block a device after expire"><?= $this->Paginator->sort('block after expire') ?></abbr></th>
                <th><abbr title="Hide remaining minutes from total surfing time"><?= $this->Paginator->sort('hidden') ?></abbr></th>
                <th><abbr title="upload quota (kbps)"><?= $this->Paginator->sort('upload') ?></abbr></th>
                <th><abbr title="download quota (kbps)"><?= $this->Paginator->sort('download') ?></abbr></th>
                <th><abbr title="traffic quota (Megabytes)"><?= $this->Paginator->sort('quota') ?></abbr></th>
                <th class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($groups as $group): ?>
                <tr>
                <td><?= $this->Number->format($group->id) ?></td>
                <td><?= h($group->name) ?></td>
                <td><?= $this->Number->format($group->minutes) ?></td>
                <td><?= $this->Number->format($group->blockInterval) ?></td>
                <td><?= $this->Number->format($group->fakeminutesoffset) ?></td>
                <td><?= $this->Number->format($group->upload) ?></td>
                <td><?= $this->Number->format($group->download) ?></td>
                <td><?= $this->Number->format($group->quota) ?></td>
                
                <td class="actions">
                    <abbr title="View">
                        <?= $this->Html->link(__("<small class='label bg-green'><i class='fa fa-info'></i></small>"), ['action' => 'view', $group->id], ['escape' => false]) ?>
                    </abbr>
                    <abbr title="Edit">
                         <?= $this->Html->link(__("<small class='label bg-yellow'><i class='fa fa-edit'></i></small>"), ['action' => 'edit', $group->id], ['escape' => false]) ?>
                    </abbr>
                    <abbr title="Delete">
                         <?php if($group->name!='guest' && $group->id!=3): ?>
                            <?= $this->Form->postLink(__("<small class='label bg-red'><i class='fa fa-trash-o'></i></small>"), ['action' => 'delete', $group->id], ['escape' => false, 'confirm' => __('Are you sure you want to delete group {0}?', $group->name)]) ?>
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

