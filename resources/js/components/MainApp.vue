<template>
    <div id="main"> 
        <section >
            <div class="mainwrapper">
                
                MAIN__APP
            </div>
            <router-view></router-view>
        </section>
        <left-panel></left-panel>
        <left-panel></left-panel>
        <left-panel></left-panel>
    </div>
</template>
<script>

import LeftPanel from '../components/LeftPanel.vue'; 

export default {
    name: 'main-app',
    components: { LeftPanel },                    
    mounted() {
            console.log('Component MAIN_APP mounted.')
    }
}
</script>