<div>

            <div class="layout-px-spacing">
                
                <div class="row app-notes layout-top-spacing" id="cancel-row">
                    <div class="col-lg-12">
                    <div class="row mt-2 ">
                <h4 class="modal-title" id="exampleModalLabel">Rating</h4>
                            

             
                                
                <div class="col-sm-3  ml-auto">
                                        <input id="search-text" type="search" class="form-control mb-1 mr-5" wire:model="search"  placeholder="Search Rating.." >
                                        </div> 
                                        
                                      
                                   
                                </div> 

                        <div class="app-container">
                            
                            <div class="app-note-container">

                                <div class="app-note-overlay"></div>
                              
                           


                                <div id="ct" class="note-container note-grid">
                                    
                                    

                                  

                                  

                            

                                

                                    
                                     @foreach($ratings as $rating)
                                    <div class="note-item all-notes note-fav">
                                        <div class="note-inner-content">
                                            <div class="note-content">
                                                <p class="note-title" data-noteTitle="Team meet at Starbucks">{{$rating->restaurant->name}}</p>
                                                <p class="meta-time">{{$rating->user->name}}</p>
                                                <div class="note-description-content">
                                                    <p class="note-description" data-noteDescription="Etiam a odio eget enim aliquet laoreet lobortis sed ornare nibh.">{{$rating->comments}}</p>
                                                </div>
                                            </div>
                                            <div class="note-action">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star fav-note"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg><b>{{$rating->rating}}</b>
                                               
                                            </div>
                                            <div class="note-footer">
                                                
                                            </div>
                                        </div>
                                    </div>

                                   @endforeach

                                </div>

                            </div>
                            
                        </div>

                        <!-- Modal -->
                                            <div class="modal fade" id="notesMailModal" tabindex="-1" role="dialog" aria-labelledby="notesMailModalTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="modal"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                            <div class="notes-box">
                                                                <div class="notes-content">                                                                        
                                                                    <form action="javascript:void(0);" id="notesMailModalTitle">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="d-flex note-title">
                                                                                    <input type="text" id="n-title" class="form-control" maxlength="25" placeholder="Title">
                                                                                </div>
                                                                                <span class="validation-text"></span>
                                                                            </div>

                                                                            <div class="col-md-12">
                                                                                <div class="d-flex note-description">
                                                                                    <textarea id="n-description" class="form-control" maxlength="60" placeholder="Description" rows="3"></textarea>
                                                                                </div>
                                                                                <span class="validation-text"></span>
                                                                            </div>
                                                                        </div>

                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button id="btn-n-save" class="float-left btn">Save</button>
                                                            <button class="btn" data-dismiss="modal"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg> Discard</button>
                                                            <button id="btn-n-add" class="btn">Add</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                        
                    </div>
                </div>

            </div>
            
</div>
