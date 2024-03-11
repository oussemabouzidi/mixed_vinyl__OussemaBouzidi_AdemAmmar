import { Controller } from '@hotwired/stimulus';
import axios from 'axios';

export default class extends Controller {
    static values = {
        infoUrl: String,
    }

    // Maintain reference to the currently playing audio
    currentAudio = null;

    play(event) {
        event.preventDefault();

        // Stop currently playing audio, if any
        if (this.currentAudio) {
            this.currentAudio.pause();
        }

        axios.get(this.infoUrlValue)
            .then((response) => {
                const audio = new Audio(response.data.url);

                // Listen for the loadedmetadata event before playing
                audio.addEventListener('loadedmetadata', () => {
                    audio.play();
                });

                // Update the reference to the currently playing audio
                this.currentAudio = audio;
            });
    }
}
