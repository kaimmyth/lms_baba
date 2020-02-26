    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-car icon-gradient bg-mean-fruit">
                            </i>
                        </div>
                        <div>Manage Multiple Choice Question
                            <div class="page-title-subheading">This is an example dashboard created using build-in elements and components.
                            </div>
                        </div>
                    </div><!--end of page-title-heading -->
            </div><!--end of page-title-wrapper-->
        </div><!--end of page title-->
        <div class="card-body">
            <div class="dropdown d-inline-block">
                <button  type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="mb-2 mr-2 dropdown-toggle btn btn-primary">New Question</button>
                <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu">
                    <div class="container">
                        <div class="radio">
                          <input id="radio-1" name="radio" type="radio" checked>
                          <label for="radio-1" class="radio-label">Single Choice</label>
                        </div>
                      
                        <div class="radio">
                          <input id="radio-2" name="radio" type="radio">
                          <label  for="radio-2" class="radio-label">Multiple Choice</label>
                        </div>

                        <div class="radio">
                            <input id="radio-3" name="radio" type="radio">
                            <label  for="radio-3" class="radio-label">Extended Text</label>
                        </div>

                        <div class="radio">
                            <input id="radio-4" name="radio" type="radio">
                            <label  for="radio-4" class="radio-label">Text Entry</label>
                        </div>

                        <li class="nav-item-divider nav-item"></li>
                        <li class="nav-item-btn nav-item">
                            <a href="{{url('Set_mcq_question')}}"><button class="btn-wide btn-shadow btn btn-primary btn-sm">GO</button></a>
                        </li>
                       
                      </div>
                </div>
            </div>
            
            
            <hr class="new2">


           <!--START OF TABLE-->
                <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Question</th>
                        <th>Category</th>
                        <th>Score</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <div class="form-check" style="margin-top: -16px;">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input"></label>
                            </div>
                        </td>

                        <td>In each of the following questions, find the correctly spelt word. ?</td>
                        <td>Computer Branch</td>
                        <td>0</td>
                      
                        <td>Multiple Choice</td>
                        <td>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="form-check" style="margin-top: -16px;">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input"></label>
                            </div>
                        </td>

                        <td>A light sensitive device that converts drawing, printed text or other images into digital form is ?</td>
                        <td>Computer Branch</td>
                        <td>0</td>
                      
                        <td>Multiple Choice</td>
                        <td>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="form-check" style="margin-top: -16px;">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input"></label>
                            </div>
                        </td>
                        <td>Which protocol provides e-mail facility among different hosts?</td>
                        <td>Computer Branch</td>
                        <td>0</td>
                      
                        <td>Multiple Choice</td>
                        <td>
                            <button class="btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary"><i class="pe-7s-tools btn-icon-wrapper"> </i></button>
                            <button class="btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-dark"><i class="pe-7s-helm btn-icon-wrapper"> </i></button>   
                        </td>
                    </tr>
                   </tbody>
                </table>
            </div>
        </div><!--end of main inner-->