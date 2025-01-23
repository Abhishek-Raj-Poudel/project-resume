export interface SocialLink {
    title: string;
    link: string;
}

interface Education {
    title: string;
    location: string;
    courseName: string;
    graduationDate: string;
}

export interface Resume {
    resumeName: string;
    name: string;
    contactNumber: string;
    email: string;
    socialLinks: SocialLink[];
    education: Education[];
    technicalSkill:any[];
    projectExperience: any[];
    workExperience: any[];
    certification: any[];
    achievements: any[];
}
