import React from 'react'

export default function SingleResume({resume}:any) {
    const {id} = resume
    console.log("resume",resume)
  return (
    <div>SingleResume {id}</div>
  )
}

