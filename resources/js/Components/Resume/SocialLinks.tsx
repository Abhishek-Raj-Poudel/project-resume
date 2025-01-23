import { Resume, SocialLink } from "@/types/resume";
import { resumeStore } from "@/Zustand/resumeStore";
import { Input, Label } from "@headlessui/react";
import { Plus } from "lucide-react";
import { ChangeEvent, useState } from "react";

export default function SocialLinks() {
    const { data, setData } = resumeStore();

    const [socialLink, setSocialLink] = useState<SocialLink>({
        title: "",
        link: ""
    });

    /**TODO:
        * Create a repeatable form containing a input for title and link.
        * impliment function that takes the socialLink and appends it to socialLink in frontend.
        * show all social links as data as well as input fields and make it easy to edit
        * have the ability to delete a socialLink
    */

    const handleChange = (key: string) => (e: ChangeEvent<HTMLInputElement>) => {
        console.log("here", key, e)
    }

    return (
        <div className="flex flex-col gap-4">
            {data.socialLinks.map((item) => (
                <div>
                    <label htmlFor="contactNumber" className="block font-medium text-sm text-gray-700">
                        Contact Number
                    </label>

                    <input
                        value={item.title || ""}
                        onChange={handleChange("title")}
                        id="title"
                        className="w-full border rounded p-2"
                    />
                </div>
            ))}


            <button
                type="button"
                className="w-full border flex justify-center p-2 rounded hover:bg-neutral-300 duration-200 mt-2"
            >
                <Plus />
            </button>

        </div>
    )
}

