<div class="header">
            <div class="header-content">
                <div class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <form id="search" method="post" action="<?php $this->options->siteUrl(); ?>" role="search">
                                <div class="search-area input-group">
                                    <span class="input-group-text">
										<svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
											<circle cx="10.7861" cy="11.2859" r="8.23951" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></circle>
											<path d="M16.5168 17.4443L19.7472 20.6663" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
										</svg>
									</span>
                                    <input type="text" id="s" name="s" class="text form-control" placeholder="<?php _e('输入关键字搜索'); ?>" />
                                </div>
                            </form>
                        </div>
                        <ul class="navbar-nav header-right gap-2">
                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link open-cal">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="28" height="28" fill="currentColor"><path d="M17 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H7V1H9V3H15V1H17V3ZM4 9V19H20V9H4ZM6 11H8V13H6V11ZM6 15H8V17H6V15ZM10 11H18V13H10V11ZM10 15H15V17H10V15Z"></path></svg>
                                </a>
                                
							</li>
							<li id="back-to-top">
							    <a >
							        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="28" height="28" fill="currentColor"><path d="M5.33053 15.9288C5.115 14.9914 5.00054 14.0103 5.00054 12.9999C5.00054 7.91198 7.90319 3.5636 12.0005 1.81799C16.0979 3.5636 19.0005 7.91198 19.0005 12.9999C19.0005 14.0103 18.8861 14.9914 18.6706 15.9288L20.6907 17.7245C20.8704 17.8842 20.9109 18.1493 20.7872 18.3555L18.33 22.4508C18.1879 22.6876 17.8808 22.7644 17.644 22.6223C17.609 22.6013 17.5766 22.576 17.5477 22.5471L15.2934 20.2928C15.1059 20.1053 14.8515 19.9999 14.5863 19.9999H9.41476C9.14954 19.9999 8.89519 20.1053 8.70765 20.2928L6.45337 22.5471C6.2581 22.7424 5.94152 22.7424 5.74626 22.5471C5.71735 22.5182 5.6921 22.4859 5.67107 22.4508L3.21385 18.3555C3.09014 18.1493 3.13071 17.8842 3.31042 17.7245L5.33053 15.9288ZM12.0005 12.9999C13.1051 12.9999 14.0005 12.1045 14.0005 10.9999C14.0005 9.89537 13.1051 8.99994 12.0005 8.99994C10.896 8.99994 10.0005 9.89537 10.0005 10.9999C10.0005 12.1045 10.896 12.9999 12.0005 12.9999Z"></path></svg>
							    </a>
							</li>
                            <li class="nav-item ps-3">
                                <div class="header-profile2">
                                    <div class="header-info2 d-flex align-items-center">
                                        <div class="header-media">
                                            <img src="<?php _getAvatarByMail($this->author->mail) ?> " class="avatar avatar-lg" alt="<?php $this->author(); ?>">
                                        </div>
                                        <div class="header-info">
											<h6><?php $this->author(); ?></h6>
											<p><?php $this->author->mail(); ?></p>
										</div>
                                    </div>
                                    <div class="profile-box">
										<div class="products">
											<div class="border-img">
                                                <img src="<?php _getAvatarByMail($this->author->mail) ?> " class="avatar avatar-lg" alt="<?php $this->author(); ?>">
											</div>	
											<div class="ms-3">
												<h6 class="mb-0"><?php $this->author(); ?></h6>
												<span class="d-block mb-1"><?php $this->author->mail(); ?></span>
											</div>	
										</div>
										<div class="account-setting">
										    
											<div class="d-flex align-items-center">
												<a href="javascript:void(0);" class="dropdown-item ai-icon ">
													<div style="display:flex;align-items:center;">
													<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M17.4999 10.6583C17.3688 12.0768 16.8365 13.4287 15.9651 14.5557C15.0938 15.6826 13.9195 16.5382 12.5797 17.0221C11.2398 17.5061 9.7899 17.5984 8.3995 17.2884C7.0091 16.9784 5.73575 16.2788 4.72844 15.2715C3.72113 14.2642 3.02153 12.9908 2.71151 11.6004C2.40148 10.21 2.49385 8.76007 2.9778 7.42025C3.46175 6.08042 4.31728 4.90614 5.44426 4.03479C6.57125 3.16345 7.92308 2.63109 9.34158 2.5C8.51109 3.62356 8.11146 5.00787 8.21536 6.40118C8.31926 7.79448 8.9198 9.10421 9.90775 10.0922C10.8957 11.0801 12.2054 11.6807 13.5987 11.7846C14.992 11.8885 16.3764 11.4888 17.4999 10.6583Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
													</svg>
													<span class="ms-2">Dark Mode</span>
													</div>
												</a>
												<div class="dz-layout light">
													<i class="sun">☀️</i>
													<i class="moon">🌙</i>
												</div>	
											</div>
											<?php if (! $this->user->hasLogin()): ?>
											<a class="Logout-open ai-icon" style="display:flex;align-items:center;">
												<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M7.5 17.5H4.16667C3.72464 17.5 3.30072 17.3244 2.98816 17.0118C2.67559 16.6993 2.5 16.2754 2.5 15.8333V4.16667C2.5 3.72464 2.67559 3.30072 2.98816 2.98816C3.30072 2.67559 3.72464 2.5 4.16667 2.5H7.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
													<path d="M13.3333 14.1663L17.4999 9.99967L13.3333 5.83301" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
													<path d="M17.5 10H7.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
												</svg>
												<span class="ms-2">Logout </span>
											</a>
											<?php endif; ?>
										</div>
									</div>
                                </div>
                                
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>