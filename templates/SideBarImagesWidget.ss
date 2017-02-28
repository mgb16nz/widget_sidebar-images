<% if $SideBarImages %>
    <!-- SideBarImages ImagesSlider -->
    <section id="SidebarImages" class="card card-block">
        <div id="imageSlider" class="fadeOut owl-carousel">
            <% loop $SideBarImages %>
            <div class="item">
                <img class="img-fluid" src="$SideBarPhoto.URL" title="$SideBarImageTitle" alt="$SideBarImageAlt" />
            </div>
            <% end_loop %>
        </div>
    </section>
    <!-- end of SideBarImages ImagesSlider -->
<% end_if %>
