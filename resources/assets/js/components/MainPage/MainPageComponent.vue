<template>
    <div class="page-container">
        <md-app>
            <md-app-toolbar class="md-primary">
                <md-button class="md-icon-button" @click="toggleMenu" v-if="!menuVisible">
                    <md-icon>menu</md-icon>
                </md-button>
                <span class="md-title">Apartment book</span>
            </md-app-toolbar>

            <md-app-drawer :md-active.sync="menuVisible" md-persistent="full">
                <md-toolbar class="md-transparent" md-elevation="0">
                    <span>Navigation</span>

                    <div class="md-toolbar-section-end">
                        <md-button class="md-icon-button md-dense" @click="toggleMenu">
                            <md-icon>keyboard_arrow_left</md-icon>
                        </md-button>
                    </div>
                </md-toolbar>

                <md-list>
                    <md-list-item>
                        <md-icon>move_to_inbox</md-icon>
                        <span class="md-list-item-text">Inbox</span>
                    </md-list-item>

                    <md-list-item>
                        <md-icon>send</md-icon>
                        <span class="md-list-item-text">Sent Mail</span>
                    </md-list-item>

                    <md-list-item>
                        <md-icon>delete</md-icon>
                        <span class="md-list-item-text">Trash</span>
                    </md-list-item>

                    <md-list-item>
                        <md-icon>error</md-icon>
                        <span class="md-list-item-text">Spam</span>
                    </md-list-item>
                </md-list>
            </md-app-drawer>

            <md-app-content>

                <md-card v-for="(item,key) in apartments" :key="key">
                    <md-card-area>
                        <md-card-media>
                            <img :src="'images/apartments/' + item.image" alt="People">
                        </md-card-media>

                        <md-card-header>
                            <div class="md-title">{{item.name}}</div>
                            <div class="md-subhead">Price: {{item.price}}<font-awesome-icon icon="ruble-sign" /></div>
                        </md-card-header>

                        <md-card-content>
                            <md-list class="flex-row">
                                <md-list-item>
                                    <font-awesome-icon icon="building" />
                                    <span class="md-list-item-text">{{item.storeys}}</span>
                                </md-list-item>
                                <md-list-item>
                                    <font-awesome-icon icon="bed" />
                                    <span class="md-list-item-text">{{item.bedrooms}}</span>
                                </md-list-item>
                                <md-list-item>
                                    <font-awesome-icon icon="bath" />
                                    <span class="md-list-item-text">{{item.bathrooms}}</span>
                                </md-list-item>
                                <md-list-item>
                                    <font-awesome-icon icon="car" />
                                    <span class="md-list-item-text">{{item.garages}}</span>
                                </md-list-item>
                            </md-list>

                            <div>{{item.description}}</div>
                        </md-card-content>
                    </md-card-area>

                    <md-card-actions md-alignment="left">
                        <md-button>Book</md-button>
                        <md-button>Show more</md-button>
                    </md-card-actions>
                </md-card>

            </md-app-content>
        </md-app>
    </div>
</template>

<script>
    export default {
        name: "MainPageComponent",
        data: () => ({
            menuVisible: true,
            apartments: []
        }),
        methods: {
            toggleMenu () {
                this.menuVisible = !this.menuVisible
            },
            getApartments(){
                axios.get("http://localhost/api/apartments")
                    .then(res => {
                        console.log(res.data.data);
                        this.apartments = res.data.data;
                    })
            }
        },
        mounted(){
            console.log("Was mounted...");
            this.getApartments();
        },
    }
</script>

<style scoped>
    .md-card {
        width: 320px;
        margin: 4px;
        display: inline-block;
        vertical-align: top;
    }
    .md-list-item-text{
        margin-left: 10px;
    }
</style>
