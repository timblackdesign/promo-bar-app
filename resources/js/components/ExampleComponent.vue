<template>
<div>
    <div style="--top-bar-background:#00848e; --top-bar-background-lighter:#1d9ba4; --top-bar-color:#f9fafb;">
        <div class="Polaris-Layout">
            <div class="Polaris-Layout__AnnotatedSection">
            <div class="Polaris-Layout__AnnotationWrapper">
                <div class="Polaris-Layout__Annotation">
                <div class="Polaris-TextContainer">
                    <h2 class="Polaris-Heading">Live promo bars</h2>
                    <div class="Polaris-Layout__AnnotationDescription">
                    <p>These promos are currently active on your website.</p>
                    <button style="margin-top: 15px;" @click="showNewForm = true" type="button" class="Polaris-Button Polaris-Button--primary"><span class="Polaris-Button__Content"><span class="Polaris-Button__Text">Create New Promo</span></span></button>
                    </div>
                </div>
                </div>
                <div class="Polaris-Layout__AnnotationContent">
                <div class="Polaris-Card" v-for="item in announcements" v-bind:key="item.id" style="margin-bottom: 1rem;">
                    <div class="Polaris-CalloutCard__Container">
                        <div class="Polaris-Card__Header">
                            <div class="Polaris-Stack Polaris-Stack--alignmentBaseline">
                                <div class="Polaris-Stack__Item Polaris-Stack__Item--fill">
                                    <h2 class="Polaris-Heading">{{ item.title }}</h2>                   
                                </div>
                                <div class="Polaris-Stack__Item">
                                    <div class="Polaris-ButtonGroup">
                                        <div class="Polaris-ButtonGroup__Item Polaris-ButtonGroup__Item--plain">
                                            <button @click="removeItem(item)" class="Polaris-Button Polaris-Button--destructive Polaris-Button--plain" type="button">
                                                <span class="Polaris-Button__Content">
                                                    <span class="Polaris-Button__Text">Delete</span>
                                                </span>
                                            </button>
                                        </div>
                                        <div class="Polaris-ButtonGroup__Item Polaris-ButtonGroup__Item--plain">
                                            <button @click="editItem(item)" class="Polaris-Button Polaris-Button--plain" type="button">
                                                <span class="Polaris-Button__Content">
                                                    <span class="Polaris-Button__Text">Edit</span>
                                                </span>
                                            </button>
                                        </div>                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="Polaris-Card__Section">
                        <p>{{ item.content }}</p>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <div class="Polaris-Card" style="display: none;" >
        <div class="Polaris-CalloutCard__Container">
            <div class="Polaris-Card__Header">
                <h2 class="Polaris-Heading">Your Announcements</h2>
            </div>
            <div class="Polaris-Card__Section" v-for="item in announcements" v-bind:key="item.id">
                {{ item.title }}
                <hr/>
                <div id="preview" >
                    {{ item.content }}
                </div>
            </div>
        </div>
    </div>
    <div class="Polaris-Card" v-show="showNewForm">
        <div class="Polaris-CalloutCard__Container">
            <div class="Polaris-Card__Section">
                <div class="Polaris-CalloutCard">
                    <div class="Polaris-CalloutCard__Content">
                        <div class="Polaris-CalloutCard__Title">
                            <h2 class="Polaris-Heading">Create an Announcement</h2>
                        </div>
                        <div class="Polaris-TextContainer">
                            <p>Fill out the form below</p>

                              <form method="POST" action="/" @submit.prevent="onSubmit">
                                <div class="Polaris-FormLayout">
                                <div class="Polaris-FormLayout__Item">
                                    <div class="">
                                    <div class="Polaris-Labelled__LabelWrapper">
                                        <div class="Polaris-Label"><label id="PolarisTextField4Label" for="PolarisTextField4" class="Polaris-Label__Text">Title</label></div>
                                    </div>
                                    <div class="Polaris-Connected">
                                        <div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
                                        <div class="Polaris-TextField">
                                            <input name="title" type="text" placeholder="Title" v-model="title" id="PolarisTextField4" class="Polaris-TextField__Input" >
                                            <div class="Polaris-TextField__Backdrop"></div>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="Polaris-FormLayout__Item">
                                    <div class="">
                                    <div class="Polaris-Labelled__LabelWrapper">
                                        <div class="Polaris-Label"><label id="PolarisTextField5Label" for="PolarisTextField5" class="Polaris-Label__Text">Content</label></div>
                                    </div>
                                    <div class="Polaris-Connected">
                                        <div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
                                        <div class="Polaris-TextField">
                                            <textarea name="content" placeholder="Content" v-model="content" id="PolarisTextField5" class="Polaris-TextField__Input" ></textarea>
                                            <div class="Polaris-TextField__Backdrop"></div>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="Polaris-FormLayout__Item"><button type="submit" class="Polaris-Button"><span class="Polaris-Button__Content"><span class="Polaris-Button__Text">Submit</span></span></button></div>
                                </div><span class="Polaris-VisuallyHidden"><button type="submit" aria-hidden="true" tabindex="-1">Submit</button></span>
                            </form>
                        
                        </div>
                        
                    </div><img src="https://cdn.shopify.com/s/assets/admin/checkout/settings-customizecart-705f57c725ac05be5a34ec20c05b94298cb8afd10aac7bd9c7ad02030f48cfa0.svg" alt="" class="Polaris-CalloutCard__Image">
                </div>
            </div>
        </div>
    </div>


    <div class="Polaris-Card" v-show="showEditForm">
        <div class="Polaris-CalloutCard__Container">
            <div class="Polaris-Card__Section">
                <div class="Polaris-CalloutCard">
                    <div class="Polaris-CalloutCard__Content">
                        <div class="Polaris-CalloutCard__Title">
                            <h2 class="Polaris-Heading">Edit an Announcement</h2>
                        </div>
                        <div class="Polaris-TextContainer">
                            <p>Fill out the form below</p>

                              <form method="POST" action="/" @submit.prevent="onEditSubmit">
                                <input name="id" value="" type="hidden" v-model="activeItem.id" />
                                <div class="Polaris-FormLayout">
                                <div class="Polaris-FormLayout__Item">
                                    <div class="">
                                    <div class="Polaris-Labelled__LabelWrapper">
                                        <div class="Polaris-Label"><label id="PolarisTextField4Label" for="PolarisTextField4" class="Polaris-Label__Text">Title</label></div>
                                    </div>
                                    <div class="Polaris-Connected">
                                        <div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
                                        <div class="Polaris-TextField">
                                            <input name="title" type="text" placeholder="Title" v-model="activeItem.title" id="PolarisTextField4" class="Polaris-TextField__Input" >
                                            <div class="Polaris-TextField__Backdrop"></div>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="Polaris-FormLayout__Item">
                                    <div class="">
                                    <div class="Polaris-Labelled__LabelWrapper">
                                        <div class="Polaris-Label"><label id="PolarisTextField5Label" for="PolarisTextField5" class="Polaris-Label__Text">Content</label></div>
                                    </div>
                                    <div class="Polaris-Connected">
                                        <div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
                                        <div class="Polaris-TextField">
                                            <textarea name="content" placeholder="Content" v-model="activeItem.content" id="PolarisTextField5" class="Polaris-TextField__Input" ></textarea>
                                            <div class="Polaris-TextField__Backdrop"></div>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="Polaris-FormLayout__Item"><button type="submit" class="Polaris-Button"><span class="Polaris-Button__Content"><span class="Polaris-Button__Text">Submit</span></span></button></div>
                                </div><span class="Polaris-VisuallyHidden"><button type="submit" aria-hidden="true" tabindex="-1">Submit</button></span>
                            </form>

                            <photoshop v-model="colors" />
                        
                        </div>
                        
                    </div><img src="https://cdn.shopify.com/s/assets/admin/checkout/settings-customizecart-705f57c725ac05be5a34ec20c05b94298cb8afd10aac7bd9c7ad02030f48cfa0.svg" alt="" class="Polaris-CalloutCard__Image">
                </div>
            </div>
        </div>
    </div>


</div>
</template>

<script>
    import { Chrome } from 'vue-color'

    export default {
        props: ['items'],
        components: {
            'photoshop': Chrome
        },
        data() {
            return {
                colors: '#194d33',
                title: 'New Announcement Bar',
                content: '<!-- Content goes here -->',
                announcements: this.items,
                activeItem: {
                    "title": "",
                    "content": "",
                    "id": ""
                },
                showNewForm: false,
                showEditForm: false,
                showColorPicker: true
            }
        },
        methods: {
            onSubmit() {
                console.log('===== == == == =')
                console.log(this.$data.announcements)
                console.log('===== == == == =')
                axios.post('/', this.$data)
                .then(function (response) {
                    console.log(response)
                    this.announcements = response.data.items
                    this.showNewForm = false
                }.bind(this))
                .catch(function (error) {
                    console.log(error)
                });
            },
            updateList(list) {
                // this.announcements = list
            },
            editItem(item) {
                this.activeItem = item
                this.showEditForm = true          
            },
            onEditSubmit() {
                console.log('===== == == == =')
                console.log(this.$data.announcements)
                console.log('===== == == == =')
                axios.put('/', this.$data.activeItem)
                .then(function (response) {
                    console.log(response)
                    this.announcements = response.data.items
                    this.showEditForm = false
                }.bind(this))
                .catch(function (error) {
                    console.log(error)
                });               
            },
            removeItem(item) {
               axios.delete('/', { id: item.id })
                .then(function (response) {
                    console.log(response)
                    this.announcements = response.data.items
                }.bind(this))
                .catch(function (error) {
                    console.log(error)
                }); 
            }
        },
        mounted() {
            // console.log(this.items)

        }
    }
</script>
