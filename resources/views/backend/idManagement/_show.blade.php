<div class="images" v-viewer>
    <div class="row">
        <div class="col-md-6">
            <h4 class="id-header-title">{{ __('Front ID') }} {{ id_type($user->id_type)}}</h4>
            <img src="{{ get_id_image($user->id_card_front) }}" alt="{{ __('ID Card Back') }}" class="img-responsive cm-center id-image">
        </div>
        
            <div class="col-md-6">
                <h4 class="id-header-title">{{ __('Back ID') }} {{ id_type($user->id_type)}}</h4>
                <img src="{{ get_id_image($user->id_card_back) }}" alt="{{ __('ID Card Back') }}" class="img-responsive cm-center id-image">
            </div>
      
    </div>
</div>