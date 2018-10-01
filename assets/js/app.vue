<template>
    <v-app>
        <v-container>
            <nav class="navbar is-transparent">
                <div class="navbar-brand">
                    <h1>Getting started with Symfony + VueJS</h1>
                </div>
                <div id="vue-menu" class="navbar-menu">
                    <div class="navbar-start">
                        <router-link tag='div' to="/" class="navbar-item">Home</router-link>
                        <router-link tag='div' to="hello" class="navbar-item">Hello</router-link>
                        <router-link tag='div' to="notfound" class="navbar-item">Not Found URL</router-link>
                    </div>
                </div>
            </nav>

            <label for="name">Enter your name</label>
            <input type="text" class="form-control" id="name" placeholder="Full Name">

            <div class="row">
                <div class="col-sm-12">
                    <v-alert
                            :value="true"
                            type="success">
                        This is a success alert.
                    </v-alert>
                    <v-text-field
                            label="Regular"
                            single-line
                            placeholder="Full Name"
                            type="text"
                    ></v-text-field>
                    <div>
                        <v-btn color="success">Success</v-btn>
                        <v-btn color="error">Error</v-btn>
                        <v-btn color="warning">Warning</v-btn>
                        <v-btn color="info">Info</v-btn>
                    </div>
                    <v-carousel>
                        <v-carousel-item
                                v-for="(item,i) in items"
                                :key="i"
                                :src="item.src"
                        ></v-carousel-item>
                    </v-carousel>
                    <v-footer
                            dark
                            height="auto"
                    >
                        <v-card
                                flat
                                tile
                                class="indigo lighten-1 white--text text-xs-center"
                        >
                            <v-card-text>
                                <v-btn
                                        v-for="icon in icons"
                                        :key="icon"
                                        class="mx-3 white--text"
                                        icon
                                >
                                    <v-icon size="24px">{{ icon }}</v-icon>
                                </v-btn>
                            </v-card-text>

                            <v-card-text class="white--text pt-0">
                                Phasellus feugiat arcu sapien, et iaculis ipsum elementum sit amet. Mauris cursus
                                commodo interdum. Praesent ut risus eget metus luctus accumsan id ultrices nunc. Sed at
                                orci sed massa consectetur dignissim a sit amet dui. Duis commodo vitae velit et
                                faucibus. Morbi vehicula lacinia malesuada. Nulla placerat augue vel ipsum ultrices,
                                cursus iaculis dui sollicitudin. Vestibulum eu ipsum vel diam elementum tempor vel ut
                                orci. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus
                                mus.
                            </v-card-text>

                            <v-divider></v-divider>

                            <v-card-text class="white--text">
                                &copy;2018 — <strong>Vuetify</strong>
                            </v-card-text>
                        </v-card>
                    </v-footer>
                </div>
            </div>

            <div>
                <router-view></router-view>
            </div>
        </v-container>
    </v-app>
</template>

<script>
    export default {
        name: "app",
        data() {
            return {
                items: [
                    {
                        src: 'https://cdn.vuetifyjs.com/images/carousel/squirrel.jpg'
                    },
                    {
                        src: 'https://cdn.vuetifyjs.com/images/carousel/sky.jpg'
                    },
                    {
                        src: 'https://cdn.vuetifyjs.com/images/carousel/bird.jpg'
                    },
                    {
                        src: 'https://cdn.vuetifyjs.com/images/carousel/planet.jpg'
                    }
                ],
                icons: [
                    'fab fa-facebook',
                    'fab fa-twitter',
                    'fab fa-google-plus',
                    'fab fa-linkedin',
                    'fab fa-instagram'
                ]
            }
        }
    }

</script>

<style>
    .container .navbar-item {
        cursor: pointer;
        text-decoration: underline;
    }

    h1 {
        color: blue;
    }
</style>