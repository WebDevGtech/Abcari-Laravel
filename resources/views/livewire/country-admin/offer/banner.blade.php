<div>
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing" id="cancel-row">

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div class="row m-2 ">
                        <h4 class="modal-title " id="exampleModalLabel">{{ __('banner.banner')}}</h4>

                        <div class="col-sm-3  ml-auto">
                            <input id="search-text" type="search" class="form-control mb-1 mr-5" wire:model="search"
                                placeholder="Search Banner..">
                        </div>
                        <button class="btn btn-outline-primary mb-2" data-toggle="modal"
                            data-target="#addbanner">{{__('banner.add')}}</button>

                    </div>


                    @include('modals.bar-banner')

                    <table id="default-ordering" class="table table-hover dataTable" style="width:100%;"  role="grid" aria-describedby="default-ordering_info">
                        <thead>
                            <tr  role="row">
                                <th class="text-center">{{__('banner.s.no')}}</th>

                                <th class="text-center">{{__('banner.name')}}</th>
                                <th class="text-center">{{__('banner.image')}}</th>
                                <th class="text-center">{{__('banner.category')}} </th>
                                <th class="text-center">{{__('banner.position')}}</th>

                                <th class="text-center">{{__('banner.status')}} </th>
                                <th class="text-center">{{__('banner.action')}}</th>
                            </tr>
                        </thead>
                        @if(count($banners) >0)
                        <tbody>
                            @foreach($banners as $banner)
                            <tr  role="row">
                                <td class="text-center">{{$loop->index+1}}</td>

                                <td class="text-center">{{$banner->banner_name }}</td>
                                <td class="text-center"><img src="{{ Storage::url($banner->image) }}" width="100" height="50" /></td>
                                <td class="text-center">{{$banner->category->name }}</td>
                            
                                <td class="text-center"> {{$banner->position}}</td>
                                
                                
                                

                                <td class="text-center">

                                  
                                        <label class="switch s-icons s-outline s-outline-primary mr-2 mt-3 " for="{{$banner->id}}">
                                            <input type="checkbox" {{$banner->status== '1' ? 'checked':''}}
                                            wire:click="updateStatus($event.target.checked,'{{$banner->id
                                            }}')" id="{{$banner->id}}">
                                            <span class="slider round"></span>
                                        </label>
                                </td>
                                <td>
                                <button  data-target="#editmodal" wire:click.prevent="editId('{{ $banner->id  }}')"data-toggle="modal" class="btn btn-primary btn-sm  ">
                                    {{ __('banner.edit') }} 

                                </button> </td>
                              
                            </tr>
                            @endforeach
                        </tbody>
                        @else
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-center m-3">
                                    <div class="row p-4">
                                        <p>{{__('banner.norecordfound')}}</p>
                                    </div>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                        @endif
                       
                    </table>
                    {{$banners->links('vendor.livewire.bootstrap')}}
                </div>
            </div>

        </div>

    </div>


</div>
<script>
    window.addEventListener('modalClose', event => {
    $('#addcloseBanner').click()
  })
  window.addEventListener('modalClose', event => {
    $('#editClosemodal').click()
  })
  window.addEventListener('modalClose', event => {
    $('#deleteClosebanner').click()
  })
</script>