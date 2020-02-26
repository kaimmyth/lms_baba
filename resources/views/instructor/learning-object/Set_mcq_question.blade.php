<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<style>
    form{
        margin: 20px 0;
    }
    form input, button{
        padding: 5px;
    }
    table{
        width: 100%;
        margin-bottom: 20px;
        border-collapse: collapse;
    }
    table, th, td{
        border: 1px solid #cdcdcd;
    }
    table th, table td{
        padding: 10px;
        text-align: left;
    }
</style>
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-car icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Multiple Choice Question
                        <div class="page-title-subheading">This is an example dashboard created using build-in elements and components.
                        </div>
                    </div>
                </div><!--end of page-title-heading -->
            </div><!--end of page-title-wrapper-->
        </div><!--end of page title-->
        <div class="card-body">
            <h6><strong>Question</strong></h6>
            <textarea name="" id="editor" cols="20" rows="10"></textarea><br>
            <div class="position-relative form-group">
                <label for="exampleSelect" class="">Set Level Of Difficulty</label>
                <select name="select" id="exampleSelect" class="form-control" style="width: 20%;">
                    <option>Easy</option>
                    <option>Medium</option>
                    <option>Difficult</option>
                </select>
            </div>


            <hr class="new2">
            <h6><strong>Answer</strong></h6>

            <form class="form-inline">
                <div class="position-relative form-group">
                    <label for="" class="sr-only">Email</label>
                    <input name="" id="name" placeholder="" type="email" class="mr-2 form-control">
                </div>

                <input type="button" class="btn btn-primary add-row" value="Add Answer">
            </form>


            </form>
            <table>
                <thead>
                    <tr>
                        <th>Select</th>
                        <th>Type</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="checkbox" name="record"></td>
                        <td>FTP</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="record"></td>
                        <td>SMTP</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="record"></td>
                        <td>TELNET</td>
                    </tr>
                </tbody>
            </table>
            <button type="button" class="btn btn-danger delete-row">Delete Row</button>
            <button class="ladda-button mb-2 mr-2 btn-square btn btn-gradient-info" data-style="expand-right" style="margin-top: 10px;">
                <span class="ladda-label">Save Answer</span><span class="ladda-spinner"></span>
            </button>

            <hr class="new2">

            <div  style="float: right;">
                <button class="ladda-button mb-2 mr-2 btn-square btn btn-gradient-danger" data-style="slide-up">
                    <span class="ladda-label">Cancel</span><span class="ladda-spinner"></span>
                </button>

                <button class="ladda-button mb-2 mr-2 btn-square btn btn-gradient-info" data-style="expand-right">
                    <span class="ladda-label">Save Changes</span><span class="ladda-spinner"></span>
                </button>
            </div>
        </div>
    </div><!--end of main inner-->
</div>