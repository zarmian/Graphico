@extends('layouts.layout')

@section('title','Edit Profile')

@section('content')
<div class="page-wrapper list-profile-wrapper">
        <div class="page-title">
            <div class="container">
                <h2>My Profile</h2>
            </div>
        </div>
        <div class="page-section">
                <div class="container">
                    <div class="profile-employer-wrap">
                                        <div class="profile-box">
                            <div class="profile-employer-info-wrap active">
<div class="profile-employer-info-edit cnt-profile-hide" id="ctn-edit-profile"
                             style="">
                            <div class="employer-info-avatar avatar-profile-page">
                                <span class="employer-avatar img-avatar image">
                                    <img alt='' src='http://0.gravatar.com/avatar/e940ca497e9ace65f62723b6ebc59ab6?s=125&amp;d=&amp;r=G' class='avatar avatar-125 photo avatar-default' height='125' width='125' />                                </span>
                                <a href="#" id="user_avatar_browse_button">
									Change                                </a>
                            </div>
                            <div class="employer-info-form" id="accordion" role="tablist"
                                 aria-multiselectable="true">
                                <form id="profile_form" class="form-detail-profile-page" action="" method="post"
                                      novalidate>
                                      <h3>Profile Name</h3>
                                    <div class="input-field">
                                        <input type="text" value="Zaryab Rashid"
                                               name="display_name" id="display_name"
                                               placeholder="Your name">
                                    </div>
                                    <h3>Profile Description</h3>
                                <div class="input-field">
										<div id="wp-post_content-wrap" class="wp-core-ui wp-editor-wrap tmce-active"><link rel='stylesheet' id='editor-buttons-css'  href='' type='text/css' media='all' />
<div id="wp-post_content-editor-container" class="wp-editor-container"><textarea class="wp-editor-area" rows="20" autocomplete="off" cols="40" name="post_content" id="post_content"></textarea></div>
</div>

                                    </div>

									
                                    <div class="employer-info-save btn-update-profile btn-update-profile-top">
                                        <span class="employer-info-cancel-btn profile-show-edit-tab-btn" data-ctn_edit="cnt-profile-default">Cancel &nbsp; </span>
                                        <input type="submit" class="normal-btn btn-submit" value="Save">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection