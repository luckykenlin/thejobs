<section>
    <div class="container">

        <header class="section-header">
            <span>Get connected</span>
            <h2>Social media</h2>
        </header>

        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-facebook"></i></span>
                        <input type="text" value="{{isset($medias['facebook'])? $medias['facebook'] : null}}" name="medias[facebook]" class="form-control" placeholder="Profile URL">
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-google-plus"></i></span>
                        <input type="text" value="{{isset($medias['google'])? $medias['google'] : null}}" name="medias[google]" class="form-control" placeholder="Profile URL">
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-dribbble"></i></span>
                        <input type="text" value="{{isset($medias['dribbble'])? $medias['dribbble'] : null}}" name="medias[dribbble]" class="form-control" placeholder="Profile URL">
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-pinterest"></i></span>
                        <input type="text" value="{{isset($medias['pinterest'])? $medias['pinterest'] : null}}" name="medias[pinterest]" class="form-control" placeholder="Profile URL">
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-twitter"></i></span>
                        <input type="text" value="{{isset($medias['twitter'])? $medias['twitter'] : null}}" name="medias[twitter]" class="form-control" placeholder="Profile URL">
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-github"></i></span>
                        <input type="text" value="{{isset($medias['github'])? $medias['github'] : null}}" name="medias[github]" class="form-control" placeholder="Profile URL">
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-instagram"></i></span>
                        <input type="text" value="{{isset($medias['instagram'])? $medias['instagram'] : null}}" name="medias[instagram]" class="form-control" placeholder="Profile URL">
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-youtube"></i></span>
                        <input type="text" value="{{isset($medias['youtube'])? $medias['youtube'] : null}}" name="medias[youtube]" class="form-control" placeholder="Profile URL">
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>