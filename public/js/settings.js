var site_settings = '<div class="ts-button">'
        +'<span class="fa fa-cog fa-spin"></span>'
    +'</div>'
    +'<div class="ts-body">'
        +'<div class="ts-title">Options</div>'
        +'<div class="ts-row">'
            +'<label class="check"><input type="checkbox" class="icheckbox" name="zoom" value="1"/>Zoom</label>'
        +'</div>'
        +'<div class="ts-row">'
            +'<label class="check"><input type="checkbox" class="icheckbox" name="drag" value="1"/>Drag</label>'
        +'</div>'
        +'<div class="ts-row">'
            +'<label class="check"><input type="checkbox" class="icheckbox" name="disableanimations" value="1"/>Disable Animations</label>'
        +'</div>'
        +'<div class="ts-row">'
            +'<button id="restore-origin"type="button" class="btn btn-danger btn-block">Restore Original Position</button>'
        +'</div>'
    +'</div>';
    
var settings_block = document.createElement('div');
    settings_block.className = "theme-settings";
    settings_block.innerHTML = site_settings;
    document.body.appendChild(settings_block);
var theme_settings = {
        zoom: 0,
        drag: 0,
        animation:0,
    };
var animationduration = 1500; 
$(document).ready(function(){
    var snapsvg = Snap("#firstsvg");
    /* Default settings */
     
    $(".theme-settings input").on("ifClicked",function(){
        console.log(theme_settings);
        var input   = $(this);  
        if(!input.prop("checked")){
            theme_settings[input.attr("name")] = input.val();
        }else{            
            theme_settings[input.attr("name")] = 0;
        }    
        set_settings(theme_settings,input.attr("name"),snapsvg);
    });
    
    $("#restore-origin").on("click",function(){
        console.log("restore clicked");
        snapsvg.zpd('destroy');
        set_settings(theme_settings,false,snapsvg);
    });
    /* Open/Hide Settings */
    $(".ts-button").on("click",function(){
        $(".theme-settings").toggleClass("active");
    });
     $("#zonefinder").on("click",function(){
        var findzone = ".zone"+$("#zonepicker").val()+"-plus";
        console.log(findzone);
        $(findzone).click();
    });
    $("#rackfinder").on("click",function(){
        var findrack = "."+$("#rackpicker").val().replace(" ","-");
        console.log(findrack);
        $(findrack).click();
    });
    /* End open/hide settings */
});

function set_settings(theme_settings,option,snapsvg){

    /* Start Header Fixed */
    if(theme_settings.zoom == 1)
        snapsvg.zpd({
            zoom:true
        });
    else
        snapsvg.zpd({
            zoom:false
        });    
    /* END Header Fixed */
    
    /* Start Sidebar Fixed */
    if(theme_settings.drag == 1){        
        snapsvg.zpd({
            pan:true
        });
    }else
        snapsvg.zpd({
            pan:false
        });
    if(theme_settings.drag == 1){        
        snapsvg.zpd({
            pan:true
        });
    }else
        snapsvg.zpd({
            pan:false
        });
    if(theme_settings.disableanimations == 1){        
        animationduration=0;
    }else
        animationduration=1500;
}

function set_settings_checkbox(name,value){
    
    if(name == 'st_layout_boxed'){    
        
        $(".theme-settings").find("input[name="+name+"]").prop("checked",false).parent("div").removeClass("checked");
        
        var input = $(".theme-settings").find("input[name="+name+"][value="+value+"]");
                
        input.prop("checked",true);
        input.parent("div").addClass("checked");        
        
    }else{
        
        var input = $(".theme-settings").find("input[name="+name+"]");
        
        input.prop("disabled",false);            
        input.parent("div").removeClass("disabled").parent(".check").removeClass("disabled");        
        
        if(value === 1){
            input.prop("checked",true);
            input.parent("div").addClass("checked");
        }
        if(value === 0){
            input.prop("checked",false);            
            input.parent("div").removeClass("checked");            
        }
        if(value === -1){
            input.prop("checked",false);            
            input.parent("div").removeClass("checked");
            input.prop("disabled",true);            
            input.parent("div").addClass("disabled").parent(".check").addClass("disabled");
        }        
                
    }
}