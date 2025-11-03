import axios from 'axios'
window.axios = axios
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

import Alpine from 'alpinejs'
import { Editor } from '@tiptap/core'
import StarterKit from '@tiptap/starter-kit'

// Pastikan editor load lepas Livewire siap
document.addEventListener('livewire:load', () => {
    document.addEventListener('alpine:init', () => {
        Alpine.data('tiptapEditor', (content) => {
            let tiptapEditor

            return {
                updatedAt: Date.now(),
                editor: null,

                init() {
                    const _this = this

                    tiptapEditor = new Editor({
                        element: this.$refs.element,
                        extensions: [StarterKit],
                        content: content || '',
                        onCreate({ editor }) {
                            try {
                                content = editor.getHTML()
                            } catch {}
                            _this.editor = editor
                            _this.updatedAt = Date.now()
                        },
                        onUpdate({ editor }) {
                            try {
                                content = editor.getHTML()
                            } catch {}
                            _this.updatedAt = Date.now()
                        },
                        onSelectionUpdate() {
                            _this.updatedAt = Date.now()
                        },
                    })

                    this.editor = tiptapEditor
                },

                isActive(type, opts = {}) {
                    return this.editor?.isActive(type, opts)
                },
            }
        })
    })

    window.Alpine = Alpine
    Alpine.start()
})
