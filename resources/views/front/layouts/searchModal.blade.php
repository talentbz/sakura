<!--  advanced search modal -->
<div class="modal fade advanced-seach-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content advanced-content"> 
            <div class="modal-header advanced-header">
                <h5 class="modal-title" id="myLargeModalLabel">Advanced Search</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body advanced-body">
                <form action="">
                    <div class="form-wrapper row">
                        <div class="modal-section col-md-6 col-sm-12">
                            <div class="search-wrapper mb-4">
                                <h3>Search by Free Keywords</h3>
                                <input type="text" class="form-control" name="search_keyword">
                                <p class="mt-2">*Ref No., Maker, Model, Model Code, Chassis, Grade</p>
                            </div>
                            <div class="search-wrapper">
                                <div class="custom-from-check">
                                    <label class="form-check-label" for="noInfo">
                                        Without Add Info
                                    </label>
                                    <input class="form-check-input" type="checkbox" id="noInfo">
                                </div>
                                <div class="custom-from-check">
                                    <label class="form-check-label" for="newArr">
                                        New Arrivals
                                    </label>
                                    <input class="form-check-input" type="checkbox" id="newArr">
                                </div>
                            </div>
                            <h3 class="spec-title">SpeCifications</h3>
                            <div class=specification-list>
                                <div class="spec-left mb-1">
                                    <label for="">Mileage</label>
                                </div>
                                <div class="spec-right mb-1">
                                    <div class="spec-select">
                                        <select class="form-select">
                                            <option value="">Any</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                    <div class="spec-select">
                                        <select class="form-select">
                                            <option value="">Any</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="spec-left mb-1">
                                    <label for="">Fuel</label>
                                </div>
                                <div class="spec-right mb-1">
                                    <div class="spec-select spec-fuel">
                                        <select class="form-select">
                                            <option value="">Any</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="spec-left mb-1">
                                    <label for="">Trans</label>
                                </div>
                                <div class="spec-right mb-1">
                                    <div class="custom-from-check">
                                        <input class="form-check-input" type="checkbox" id="at">
                                        <label class="form-check-label" for="at">AT</label>
                                    </div>
                                    <div class="custom-from-check">
                                        <input class="form-check-input" type="checkbox" id="mt">
                                        <label class="form-check-label" for="mt">MT</label>
                                    </div>
                                    <div class="custom-from-check">
                                        <input class="form-check-input" type="checkbox" id="at-semi">
                                        <label class="form-check-label" for="at-semi">AT(semi)</label>
                                    </div>
                                    <div class="custom-from-check">
                                        <input class="form-check-input" type="checkbox" id="others">
                                        <label class="form-check-label" for="others">Others</label>
                                    </div>
                                </div>
                                <div class="spec-left mb-1">
                                    <label for="">Doors</label>
                                </div>
                                <div class="spec-right mb-1">
                                    <div class="custom-from-check">
                                        <input class="form-check-input" type="checkbox" id="d-two">
                                        <label class="form-check-label" for="d-two">2</label>
                                    </div>
                                    <div class="custom-from-check">
                                        <input class="form-check-input" type="checkbox" id="d-three">
                                        <label class="form-check-label" for="d-three">3</label>
                                    </div>
                                    <div class="custom-from-check">
                                        <input class="form-check-input" type="checkbox" id="d-four">
                                        <label class="form-check-label" for="d-four">4</label>
                                    </div>
                                    <div class="custom-from-check">
                                        <input class="form-check-input" type="checkbox" id="d-five">
                                        <label class="form-check-label" for="d-five">5</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-section col-md-6 col-sm-12">
                            <div class="search-wrapper mb-4">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="custom-lavel lavel-s">
                                            <lavel>Maker:</lavel>
                                        </div>
                                        <div class="custom-select select-s mb-2">
                                            <select class="form-select select-category" name="maker">
                                                <option value="">Any</option>
                                                @foreach($models as $model)
                                                    <option value="{{$model['category_name']}}">{{$model['category_name']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="custom-lavel lavel-s">
                                            <lavel>Model:</lavel>
                                        </div>
                                        <div class="custom-select select-s mb-2">
                                            <select class="form-select subcategory">
                                                <option value="">Any</option>
                                                <option></option>
                                            </select>
                                        </div>
                                        <div class="custom-lavel lavel-s">
                                            <lavel>Type:</lavel>
                                        </div>
                                        <div class="custom-select select-s mb-2">
                                            <select class="form-select">
                                                <option value="">Any</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="custom-lavel lavel-m">
                                            <lavel>Year:</lavel>
                                        </div>
                                        <div class="custom-select select-m mb-2">
                                            <div class="left-select-m">
                                                <select class="form-select " name="from_year">
                                                    <option value="">Any</option>
                                                    @foreach($year as $row)
                                                        <option value="{{$row}}">{{$row}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="right-select-m">
                                                <select class="form-select " name="to_year">
                                                    <option value="">Any</option>
                                                    @foreach($year as $row)
                                                        <option value="{{$row}}">{{$row}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="custom-lavel lavel-m">
                                            <lavel>Price:</lavel>
                                        </div>
                                        <div class="custom-select select-m mb-2">
                                            <div class="left-select-m">
                                                <select class="form-select " name="from_price">
                                                    <option value="">Any</option>
                                                    @foreach($price as $row)
                                                        <option value="{{$row}}">{{$row}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="right-select-m">
                                                <select class="form-select " name="to_price">
                                                    <option value="">Any</option>
                                                    @foreach($price as $row)
                                                        <option value="{{$row}}">{{$row}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=specification-list>
                                <div class="spec-left mb-1">
                                    <label for="" class="txt-2">Engine Code</label>
                                </div>
                                <div class="spec-right mb-1">
                                    <input type="text" class="form-control form-control-sm">
                                </div>
                                <div class="spec-left mb-1">
                                    <label for="" class="txt-2">Engine Size</label>
                                </div>
                                <div class="spec-right mb-1">
                                    <div class="spec-select">
                                        <select class="form-select">
                                            <option value="">Any</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                    <div class="spec-select">
                                        <select class="form-select">
                                            <option value="">Any</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="spec-left mb-1">
                                    <label for="" class="txt-2">Drive Type</label>
                                </div>
                                <div class="spec-right mb-1">
                                    <div class="custom-from-check">
                                        <input class="form-check-input" type="checkbox" id="2wd">
                                        <label class="form-check-label" for="2wd">2WD</label>
                                    </div>
                                    <div class="custom-from-check">
                                        <input class="form-check-input" type="checkbox" id="4wd">
                                        <label class="form-check-label" for="4wd">4WD</label>
                                    </div>
                                    <div class="custom-from-check">
                                        <input class="form-check-input" type="checkbox" id="w-others">
                                        <label class="form-check-label" for="w-others">Others</label>
                                    </div>
                                </div>
                                <div class="spec-left mb-1">
                                    <label for="">Seats</label>
                                </div>
                                <div class="spec-right mb-1">
                                    <div class="spec-select">
                                        <select class="form-select">
                                            <option value="">Any</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                    <div class="spec-select">
                                        <select class="form-select">
                                            <option value="">Any</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="spec-left mb-1">
                                    <label for="">Steering</label>
                                </div>
                                <div class="spec-right mb-1">
                                    <div class="custom-from-check">
                                        <input class="form-check-input" type="checkbox" id="right">
                                        <label class="form-check-label" for="right">Right</label>
                                    </div>
                                    <div class="custom-from-check">
                                        <input class="form-check-input" type="checkbox" id="left">
                                        <label class="form-check-label" for="left">Left</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-submit">
                            <button type="submit" class="btn btn-danger btn-rounded waves-effect waves-light">
                                <span>Search </span>
                                <i class="dripicons-arrow-thin-right"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->