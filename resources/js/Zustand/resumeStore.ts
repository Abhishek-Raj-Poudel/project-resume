import { create } from 'zustand'

import { Resume } from '../types/resume'

type store = {
    data: Resume
    setData: (key: keyof Resume, value: any) => void;
}

export const resumeStore = create<store>()((set) => ({
    data: {
        resumeName: "",
        name: "",
        contactNumber: "",
        email: "",
        socialLinks: [],
        education: [],
        technicalSkill: [],
        projectExperience: [],
        workExperience: [],
        certification: [],
        achievements: [],
    },

    setData: (key, value) => {
        set((state) => ({
            data: {
                ...state.data,
                [key]: value,
            },
        }));
    },
}))


