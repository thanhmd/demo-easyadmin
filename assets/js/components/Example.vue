<template>
    <v-app>
        <v-content>
            <v-form>
                <v-container>
                    <v-layout row wrap>
                        <v-flex xs12 sm6 md3>
                            <v-text-field
                                    label="Regular"
                                    single-line
                            ></v-text-field>
                        </v-flex>
                    </v-layout>
                </v-container>
            </v-form>
        </v-content>
    </v-app>
</template>

<script>
    export default {
        name: "example"
    }
</script>

<style scoped>

</style>