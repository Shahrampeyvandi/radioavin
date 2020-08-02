 <div class="col-md-4">
                        <h6 class="">Category: </h6>
                        <div class="cat row">
                            <div class="col-md-12">
                                <div class="d-flex">
                                    <input type="text" class="form-control mb-2" name="" id="pprev" placeholder="name">
                                </div>
                                <a href="#" class="btn btn-sm btn-primary mb-3"
                                    onclick="addCategory(event,'<?php echo e(route('Panel.AddCatAjax')); ?>')">add</a>
                                <div class="cat-wrapper  card pr-2"
                                    style=" min-height:50px;max-height: 200px;overflow-y: scroll;">
                                    <?php $__currentLoopData = \App\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="custom-control custom-checkbox custom-control-inline ">
                                        <input type="checkbox" id="cat-<?php echo e($key+1); ?>" name="categories[]"
                                            value="<?php echo e($item->id); ?>" class="custom-control-input scat" <?php if(isset($post)): ?>
                                            <?php echo e($post->categories->pluck('id')->contains($item->id) ? 'checked' : ''); ?>

                                            <?php endif; ?>>
                                        <label class="custom-control-label" for="cat-<?php echo e($key+1); ?>"><?php echo e($item->name); ?></label>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>


                        
                      <h6 class="">Tags: </h6>
                        <div class="cat row">
                            <div class="col-md-12">
                                <div class="d-flex">
                                    <input type="text" class="form-control mb-2" name="" id="tag" placeholder="name">
                                </div>
                                <a href="#" class="btn btn-sm btn-primary mb-3"
                                    onclick="addTag(event)">add</a>
                                <div class="tag-wrapper  card pr-2"
                                    style=" min-height:50px;max-height: 200px;overflow-y: scroll;">
                                    <?php $__currentLoopData = \App\Tag::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="custom-control custom-checkbox custom-control-inline ">
                                        <input type="checkbox" id="tag-<?php echo e($key+1); ?>" name="tags[]"
                                            value="<?php echo e($item->id); ?>" class="custom-control-input stag" <?php if(isset($post)): ?>
                                            <?php echo e($post->tags->pluck('id')->contains($item->id) ? 'checked' : ''); ?>

                                            <?php endif; ?>>
                                        <label class="custom-control-label" for="tag-<?php echo e($key+1); ?>"><?php echo e($item->name); ?></label>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                        

                          
                      <h6 class="">Lyrics: </h6>
                        <div class="cat row">
                            <div class="col-md-12">
                                <div class="d-flex">
                                    <input type="text" class="form-control mb-2" name="" id="lyric" placeholder="name">
                                </div>
                                <a href="#" class="btn btn-sm btn-primary mb-3"
                                    onclick="addLyric(event)">add</a>
                                <div class="tag-wrapper  card pr-2"
                                    style=" min-height:50px;max-height: 200px;overflow-y: scroll;">
                                    <?php $__currentLoopData = \App\Lyric::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="custom-control custom-checkbox custom-control-inline ">
                                        <input type="checkbox" id="lyric-<?php echo e($key+1); ?>" name="lyrics[]"
                                            value="<?php echo e($item->id); ?>" class="custom-control-input slyric" <?php if(isset($post)): ?>
                                            <?php echo e($post->lyrics->pluck('id')->contains($item->id) ? 'checked' : ''); ?>

                                            <?php endif; ?>>
                                        <label class="custom-control-label" for="lyric-<?php echo e($key+1); ?>"><?php echo e($item->name); ?></label>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                        


                          
                      <h6 class="">Arrangements: </h6>
                        <div class="cat row">
                            <div class="col-md-12">
                                <div class="d-flex">
                                    <input type="text" class="form-control mb-2" name="" id="arrangement" placeholder="name">
                                </div>
                                <a href="#" class="btn btn-sm btn-primary mb-3"
                                    onclick="addArrangement(event)">add</a>
                                <div class="arrangement-wrapper  card pr-2"
                                    style=" min-height:50px;max-height: 200px;overflow-y: scroll;">
                                    <?php $__currentLoopData = \App\Arrangement::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="custom-control custom-checkbox custom-control-inline ">
                                        <input type="checkbox" id="arrangement-<?php echo e($key+1); ?>" name="arrangements[]"
                                            value="<?php echo e($item->id); ?>" class="custom-control-input sarrangement" <?php if(isset($post)): ?>
                                            <?php echo e($post->arrangements->pluck('id')->contains($item->id) ? 'checked' : ''); ?>

                                            <?php endif; ?>>
                                        <label class="custom-control-label" for="arrangement-<?php echo e($key+1); ?>"><?php echo e($item->name); ?></label>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                        
                    </div><?php /**PATH C:\xampp\htdocs\radio\resources\views/Includes/Panel/SideForm.blade.php ENDPATH**/ ?>