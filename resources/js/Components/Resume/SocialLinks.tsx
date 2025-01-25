import { Resume, SocialLink } from "@/types/resume";
import { resumeStore } from "@/Zustand/resumeStore";
import { Input, Label } from "@headlessui/react";
import { Cross, Plus, XIcon } from "lucide-react";
import { ChangeEvent, useState } from "react";

export default function SocialLinks() {
    const { data, setData } = resumeStore();


    const [socialLink, setSocialLink] = useState<SocialLink>({
        title: "",
        link: ""
    });

    const [showForm, setshowForm] = useState(false)

    /**TODO:
        * Create a repeatable form containing a input for title and link.
        * impliment function that takes the socialLink and appends it to socialLink in frontend.
        * show all social links as data as well as input fields and make it easy to edit
        * have the ability to delete a socialLink
    */

    const handleChange = (key: string) => (e: ChangeEvent<HTMLInputElement>) => {
        console.log("here", key, e)
        setSocialLink((prev)=>({...prev,[key]:e.target.value}))
    }

    const addSocialLinkData = ()=>{
        let newSocialLinks = [...data.socialLinks]
        newSocialLinks.push(socialLink)

        setData('socialLinks',newSocialLinks)
    }

    return (
        <div className="flex flex-col gap-4">
            Social Links
            {data.socialLinks.map((item) => (
                <div>{item.link} && {item.title}</div>
            ))}

            {showForm && (
                <div className="flex gap-2 w-full ">
                    <input className="w-full" placeholder="title" name="title" value={socialLink.title} onChange={handleChange('title')} />
                    <input className="w-full" placeholder="link" name="title" value={socialLink.link} onChange={handleChange('link')} />
                    <button className="w-fit border flex justify-center p-2 rounded hover:bg-neutral-300 duration-200 bg-green-600 text-white" ><Plus/></button>
                    <button className="w-fit border flex justify-center p-2 rounded hover:bg-neutral-300 duration-200 bg-red-500 text-white"><XIcon/></button>
                </div>
            )}
            <button
                type="button"
                className="w-full border flex justify-center p-2 rounded hover:bg-neutral-300 duration-200 mt-2"
                onClick={() => setshowForm(true)}
            >
                <Plus />
            </button>

        </div>
    )
}

