import en from './en/en-js.json'
import it from './it/it-js.json'

export const locale = navigator.language.split('-')[0]
export const fallbackLocale = 'en'

export const languages = {
    en: { ...en },
    it: { ...it },
}
