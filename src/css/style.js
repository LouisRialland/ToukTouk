import React, {StyleSheet, Dimensions} from "react-native";
const {width, height, scale} = Dimensions.get("window"),
    vw = width / 100,
    vh = height / 100,
    vmin = Math.min(vw, vh),
    vmax = Math.max(vw, vh);

export default StyleSheet.create({
    "signup password + span": {
        "display": "inline-block",
        "background": "transparent url(\"http://iconizer.net/files/Wireframe_mono_icons/orig/eye.png\") center center no-repeat",
        "width": 18,
        "height": 18,
        "right": "15%",
        "transform": "translateY(-30px)",
        "position": "absolute",
        "backgroundSize": "cover"
    },
    "signup password + spanview:before": {
        "content": "''",
        "position": "absolute",
        "width": 18,
        "height": 2,
        "right": 0,
        "top": 8,
        "transform": "rotate(45deg)",
        "background": "black"
    }
});