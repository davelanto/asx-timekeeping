<?php $pager->setSurroundCount();  ?>
    <div class="row">
        <div class="">
            <nav aria-label="Employee Pagination">
                <ul class="pagination pagination-sm justify-content-end">
                    <?php if($pager->hasPrevious()): ?>
                        <li class="page-item"><a href="<?= $pager->getFirst() ?>" class="page-link">First</a></li>
                        <li class="page-item"><a href="<?= $pager->getPrevious() ?>" class="page-link">Previous</a></li>
                    <?php endif; ?>

                    <?php foreach($pager->links() as $link): ?>
                        <li class="page-item <?= $link['active'] ? 'active' : '' ?>"><a class="page-link" href="<?= $link['uri'] ?>"><?= $link['title'] ?></a></li>
                    <?php endforeach; ?>

                    <?php if($pager->hasNext()): ?>
                        <li class="page-item"><a href="<?= $pager->getNext() ?>" class="page-link">Next</a></li>
                        <li class="page-item"><a href="<?= $pager->getLast() ?>" class="page-link">Last</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </div>