<template>
    <div>
        <h1 class="text-2xl font-semibold mb-4">{{ song.title }}</h1>
        <img :src="song.cover_image" alt="Cover Image" class="w-40 h-40 object-cover mb-4">
        <div v-if="song.lyrics">
            <h3 class="font-semibold">Lyrics</h3>
            <p>{{ song.lyrics }}</p>
        </div>
        <div v-if="song.video_url">
            <h3 class="font-semibold">Video</h3>
            <iframe :src="song.video_url" class="w-full h-60"></iframe>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            song: {}
        };
    },
    mounted() {
        this.fetchSongDetails();
    },
    methods: {
        async fetchSongDetails() {
            const songId = this.$route.params.id;
            try {
                const response = await axios.get(`/api/songs/${songId}`);
                this.song = response.data;
            } catch (error) {
                console.error('Error fetching song details:', error);
            }
        }
    }
}
</script>

<style scoped>
/* Add any specific styling for the SongDetail component here */
</style>
